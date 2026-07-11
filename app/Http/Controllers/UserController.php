<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role; 
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */public function index(Request $request)
{
    $search = $request->input('search');

    $allowedSorts = ['name', 'email', 'created_at'];

    $sort = $request->input('sort', 'created_at');
    $direction = $request->input('direction', 'desc');

    if (! in_array($sort, $allowedSorts)) {
        $sort = 'created_at';
    }

    if (! in_array($direction, ['asc', 'desc'])) {
        $direction = 'desc';
    }

    $users = User::query()
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->orderBy($sort, $direction)
        ->paginate(10)
        ->withQueryString();

    return view('users.index', compact('users'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Database se saare roles lekar create view mein bhej rahe hain dropdown dynamic karne ke liye
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Input inline validate karein
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Password::defaults()],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'role' => 'required|string|exists:roles,name',
        ]);

        // File handling
        if ($request->hasFile('avatar')) {
            $validatedData['avatar_path'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Encrypt password before entry
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['is_active'] = true;

        // 'role' field ko alag karein taake users table mein insert na ho
        $userData = Arr::except($validatedData, ['role']);

        // 1. User create karein clean data ke saath
        $user = User::create($userData);

        // 2. Spatie Permission ke zariye role assign karein (model_has_roles table automatic fill hogi)
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User successfully registered with assigned role.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', Password::defaults()],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'role' => 'required|string|exists:roles,name', // Update par bhi validation lagayi h
        ]);

        // Replace old avatar if new asset exists
        if ($request->hasFile('avatar')) {
            if ($user->avatar_path) {
                Storage::disk('public')->delete($user->avatar_path);
            }
            $validatedData['avatar_path'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Manage password safely
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        // Update user metrics mapping array
        $userData = Arr::except($validatedData, ['role']);
        $user->update($userData);

        // Sync roles (purane roles hatakar naya sync karega)
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User metadata modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Prevent current administrator self-destruction loop
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Operational security fault: Cannot wipe your own active session.');
        }

        // Purge stored files
        if ($user->avatar_path) {
            Storage::disk('public')->delete($user->avatar_path);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User record cleared completely.');
    }
}