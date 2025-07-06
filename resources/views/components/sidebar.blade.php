<aside class="w-68 h-full fixed top-0 bottom-0 left-0 bg-white shadow px-4 py-6 flex flex-col">
    <div class="mb-8">
        <div class="font-bold text-xl flex items-center gap-2 mb-2 text-primary">
            <span class="w-5 h-5 rounded-full bg-primary"></span>EmpSecured
        </div>
    </div>

    <nav class="flex-1 mb-7 flex flex-col justify-between">
        <!-- Dashboard -->
        <div class="flex flex-col">
            <h2 class="font-bold py-2 pb-3">Menu</h2>
            <a class="py-3 pl-3 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-primary/10 text-primary font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700 hover:font-semibold' }}" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="py-3 pl-3 rounded-lg transition {{ request()->routeIs('employee') ? 'bg-primary/10 text-primary font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700 hover:font-semibold' }}" href="{{ route('employee') }}">Employee</a>
        </div>

        <!-- Logout (Optional) -->
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="px-3 w-full py-3 rounded-lg text-red-500 hover:bg-red-50 font-semibold transition flex items-center mt-auto">
            Logout
        </a>
    </nav>
</aside>
