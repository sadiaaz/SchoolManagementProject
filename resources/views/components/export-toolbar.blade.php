<!-- 💡 flex-col blocks elements vertically on mobile, md:flex-row stacks them horizontally on bigger screens -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-5 w-full">

    <!-- Search Form -->
    <form method="GET" class="flex w-full md:w-96">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search..."
            class="w-full rounded-l-lg border-gray-300 focus:ring-red-500 focus:border-red-500">
        
        <button class="px-5 bg-slate hover:bg-red-700 text-white rounded-r-lg transition whitespace-nowrap">
            Search
        </button>
    </form>

    <!-- Export & Action Buttons -->
    <!-- 💡 grid-cols-2 creates neat pairs on mobile, md:flex aligns them perfectly inline on desktop -->
    <div class="grid grid-cols-2 sm:flex sm:flex-wrap gap-2 w-full md:w-auto">

        <a href="{{ url("export/$module/excel") }}"
            class="px-4 py-2 bg-slate-800 hover:bg-gray-900 text-white rounded-lg transition text-center text-sm font-medium">
            Excel
        </a>
        

        <a href="{{ url("export/$module/pdf") }}"
            class="px-4 py-2 bg-slate-600 hover:bg-gray-700 text-white rounded-lg transition text-center text-sm font-medium">
            PDF
        </a>

        <a href="{{ url("export/$module/print") }}"
            target="_blank"
            class="px-4 py-2 bg-slate hover:bg-gray-700 text-white rounded-lg transition text-center text-sm font-medium">
            Print
        </a>
        

        @if($createRoute)
            <!-- 💡 col-span-2 ensures that if 3 buttons exist, the main action spans full mobile width cleanly -->
            <a href="{{ route($createRoute) }}"
                class="col-span-2 sm:col-span-1 px-4 py-2 bg-slate  -600 hover:bg-red-700 text-white rounded-lg transition text-center text-sm font-medium">
                Add {{ $title }}
            </a>
        @endif

    </div>

</div>