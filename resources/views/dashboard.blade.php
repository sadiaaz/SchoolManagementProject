<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

<div class="p-6 text-gray-900">
    <h3 class="text-xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h3>
    <p class="text-sm text-gray-600 mb-6">Logged in as: {{ auth()->user()->email }}</p>

   

    <div class="border-t pt-4">
        <h4 class="text-md font-semibold mb-3 text-gray-700">Role-Specific Viewport:</h4>

        @role('Super Admin')
            <div class="p-4 mb-4 text-sm text-purple-700 bg-purple-50 rounded-lg border border-purple-200">
                <span class="font-bold">👑 Super Admin Panel:</span> You have full system-wide access, including database management, system configurations, and multi-branch control.
            </div>
        @endrole

        @role('School Admin')
            <div class="p-4 mb-4 text-sm text-indigo-700 bg-indigo-50 rounded-lg border border-indigo-200">
                <span class="font-bold">🏢 School Admin Panel:</span> You have administrative control over this specific school branch, staff management, and student registrations.
            </div>
        @endrole

        @role('Teacher')
            <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-50 rounded-lg border border-blue-200">
                <span class="font-bold">👨‍🏫 Teacher Portal:</span> Access opened for classroom management, marking daily attendance, managing assignments, and entering exam grades.
            </div>
        @endrole

        @role('Accountant')
            <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-50 rounded-lg border border-emerald-200">
                <span class="font-bold">💵 Accountant Desk:</span> Access opened for fee structure creation, voucher generations, salary processing, and financial reporting.
            </div>
        @endrole

        @role('Parent')
            <div class="p-4 mb-4 text-sm text-amber-700 bg-amber-50 rounded-lg border border-amber-200">
                <span class="font-bold">👪 Parent Portal:</span> Access opened for monitoring child's academic performance, viewing attendance history, and clearing outstanding fee dues.
            </div>
        @endrole
    </div>
</div>


                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
