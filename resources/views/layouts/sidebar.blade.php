<aside x-data :class="$store.sidebar.open ? 'translate-x-0' : '-translate-x-full'"
    class="fixed lg:translate-x-0 lg:static z-50 w-64 h-screen bg-white border-r transition-all duration-300">

    <div class="h-16 flex items-center justify-center border-b">

        <h1 class="font-bold text-xl">
            School ERP
        </h1>

    </div>

    <nav class="p-4 space-y-2">

        {{-- Dashboard - Visible to all --}}
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Dashboard
        </a>


        {{-- Super Admin --}}
        @role('Super Admin')
        <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Manage Users
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            System Settings
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Database
        </a>
        @endrole

        {{-- School Admin --}}
        @role('School Admin')
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Students
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Teachers
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Classes
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Subjects
        </a>
        @endrole

        {{-- Teacher --}}
        @role('Teacher')
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Attendance
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Enter Marks
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Timetable
        </a>
        @endrole

        {{-- Accountant --}}
        @role('Accountant')
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Fee Management
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Vouchers
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Salary
        </a>
        @endrole

        {{-- Parent --}}
        @role('Parent')
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Child Result
        </a>

        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100">
            Child Attendance
        </a>
        @endrole

    </nav>

</aside>