<x-app-layout>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('users.index') }}"
           class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-700 font-medium">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>

            Back to Users
        </a>

        <h1 class="mt-3 text-2xl font-bold text-gray-900">
            Edit User
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Update user information and account settings.
        </p>
    </div>

    @include('layouts.alerts')

    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
            <h3 class="font-semibold text-red-700">
                Please fix the following errors:
            </h3>

            <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow border">

        <form action="{{ route('users.update', $user) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 space-y-6">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium mb-2">
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$user->name) }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$user->email) }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium mb-2">
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                <p class="text-xs text-gray-500 mt-1">
                    Leave blank if you don't want to change the password.
                </p>

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div>

                <label class="block text-sm font-medium mb-3">
                    Profile Picture
                </label>

                <div class="flex items-center gap-4">

                    <div class="w-20 h-20 rounded-full overflow-hidden border bg-gray-100 flex items-center justify-center">

                        @if($user->avatar_path)

                            <img src="{{ asset('storage/'.$user->avatar_path) }}"
                                 class="w-full h-full object-cover">

                        @else

                            <span class="text-lg font-bold text-gray-500">
                                {{ strtoupper(substr($user->name,0,2)) }}
                            </span>

                        @endif

                    </div>

                    <input
                        type="file"
                        name="avatar"
                        accept="image/*"
                        class="block w-full text-sm">

                </div>

                @error('avatar')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>

            <!-- Buttons -->
            <div class="border-t pt-6 flex justify-end gap-3">

                <a href="{{ route('users.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                    Update User

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>