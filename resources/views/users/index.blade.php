<x-app-layout>
    <!-- Outer viewport controller prevents the global page body/navigation from breaking -->
    <div class="w-full max-w-full overflow-hidden px-4 sm:px-6 lg:px-8">
        
<div class="w-full overflow-x-auto inside-scroll-area">
    <div class="mb-6">
        <a href="{{ route('users.create') }}"
            class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 mb-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
           Create User
        </a>

        <h1 class="text-2xl font-bold text-gray-800">
            User Management
        </h1>

        <p class="text-sm text-gray-500">
             Manage user accounts, assign roles, and control system access.
        </p>
    </div>

            <!-- Feedback Alerts Pipeline -->
            @if(session('success'))
                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <p class="text-sm font-medium text-rose-800">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Main Data Frame Table Wrapper -->
            <div class="w-full bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                
                <!-- Search & Secondary Action Header -->
                <div class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-gray-100">
                <x-export-toolbar
    module="users"
    title="User"
    createRoute="users.create"
    :showSearch="true"
    :showExcel="true"
    :showPdf="true"
    :showPrint="true"
    :showCreate="true" />
                    <a href="{{ route('users.create') }}"
                        class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-medium transition">
                        + Create User
                    </a>
                </div>

                <!-- Isolates table scroll completely within this frame -->
                <div class="w-full overflow-x-auto block inside-scroll-area">
                    
                    <table class="w-full text-left border-collapse whitespace-nowrap table-auto">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-4">User Core Profile</th>
                                <th class="px-6 py-4">Status Flag</th>
                                <th class="px-6 py-4">Created Timestamp</th>
                                <th class="px-6 py-4 text-right">System Interventions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse($users as $user)
                                <tr class="hover:bg-gray-50/50 transition duration-150">

                                    <!-- 1. User Profile Column (Image Div completely unmodified) -->
                                    <td class="px-6 py-4">
                                        <div class="col-span-1 md:col-span-4 flex items-center gap-3">
                                            <!-- Controlled Avatar Box -->
                                            <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-200 bg-gray-100 flex-shrink-0 flex items-center justify-center"
                                                style="width: 48px !important; height: 48px !important; max-width: 48px !important; max-height: 48px !important;">
                                                @if($user->avatar_path)
                                                    <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="{{ $user->name }}"
                                                        class="w-full h-full object-cover block"
                                                        style="width: 100% !important; height: 100% !important; max-width: 100% !important;">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center bg-blue-100 text-blue-700 font-bold text-sm uppercase">
                                                        {{ Str::of($user->name)->substr(0, 2) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="min-w-0">
                                            
    <a href="{{ request()->fullUrlWithQuery([
        'sort' => 'name',
        'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
    ]) }}"
    class="flex items-center gap-1 hover:text-blue-600">

        Name

    </a>

                                                <p class="text-xs text-gray-400 truncate">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- 2. Status Column -->
                                    <td class="px-6 py-4">
                                        @if($user->is_active)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                Active
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                                Suspended
                                            </span>
                                        @endif
                                    </td>

                                    <!-- 3. Timestamp Column -->
                                    <td class="px-6 py-4 text-xs text-gray-500">
                                        {{ $user->created_at->format('M d, Y \a\t h:i A') }}
                                    </td>

                                    <!-- 4. Actions Column -->
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2.5">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="p-1.5 text-gray-400 hover:text-blue-600 rounded-md border border-transparent hover:border-blue-100 hover:bg-blue-50 transition"
                                                title="Modify Data">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to permanently erase this user account? This operational choice cannot be undone.');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-1.5 text-gray-400 hover:text-rose-600 rounded-md border border-transparent hover:border-rose-100 hover:bg-rose-50 transition"
                                                    title="Erase Record">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2 2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-4M4 13h4" />
                                        </svg>
                                        <p class="font-medium text-base text-gray-600">No registered users inside storage</p>
                                        <p class="text-xs mt-1">Click the top action handler to register your initial entity record.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Grid Block -->
                @if($users->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>