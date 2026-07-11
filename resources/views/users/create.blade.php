<x-app-layout>

<div class="max-w-4xl">

    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('users.index') }}"
            class="inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 mb-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Users
        </a>

        <h1 class="text-2xl font-bold text-gray-800">
            Create User
        </h1>

        <p class="text-sm text-gray-500">
            Create a new user account and assign a role.
        </p>
    </div>

    @include('layouts.alerts')

    @if ($errors->any())
        <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4">
            <h3 class="font-semibold text-red-700 mb-2">
                Please correct the following errors:
            </h3>

            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-lg border border-gray-200 bg-white p-6">

        <form action="{{ route('users.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-5">

            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    autocomplete="name"
                    required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('name') border-red-500 @enderror">

                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $error }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('email') border-red-500 @enderror">

                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $error }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    minlength="8"
                    autocomplete="new-password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('password') border-red-500 @enderror">

                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $error }}</p>
                @enderror

                <p class="mt-1 text-xs text-gray-500">
                    Password must contain at least 8 characters.
                </p>
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    minlength="8"
                    autocomplete="new-password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Role
                </label>

                <select
                    name="role"
                    required
                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 @error('role') border-red-500 @enderror">

                    <option value="" {{ old('role') ? '' : 'selected' }} disabled>
                        Select Role
                    </option>

                    <option value="Super Admin" {{ old('role')=='Super Admin' ? 'selected' : '' }}>
                        Super Admin
                    </option>

                    <option value="School Admin" {{ old('role')=='School Admin' ? 'selected' : '' }}>
                        School Admin
                    </option>

                    <option value="Teacher" {{ old('role')=='Teacher' ? 'selected' : '' }}>
                        Teacher
                    </option>

                    <option value="Accountant" {{ old('role')=='Accountant' ? 'selected' : '' }}>
                        Accountant
                    </option>

                    <option value="Parent" {{ old('role')=='Parent' ? 'selected' : '' }}>
                        Parent
                    </option>

                </select>

                @error('role')
                    <p class="mt-1 text-xs text-red-600">{{ $error }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Profile Image
                </label>

                <input
                    type="file"
                    name="avatar"
                    accept="image/png,image/jpeg,image/jpg,image/webp"
                    class="block w-full rounded-lg border border-gray-300 text-sm
                        file:mr-4
                        file:border-0
                        file:bg-blue-600
                        file:px-4
                        file:py-2
                        file:text-sm
                        file:font-medium
                        file:text-white
                        hover:file:bg-blue-700">

                @error('avatar')
                    <p class="mt-1 text-xs text-red-600">{{ $error }}</p>
                @enderror

                <p class="mt-1 text-xs text-gray-500">
                    Optional. JPG, JPEG, PNG or WEBP (Maximum 2 MB).
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 border-t border-gray-200 pt-5">

                <a href="{{ route('users.index') }}"
                    class="rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-200">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
                    Create User
                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>