<nav class="bg-blue-600 text-white" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center px-4 py-3">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold">BossGuide</a>


        <button class="sm:hidden focus:outline-none" @click="open = !open">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>


        <div class="hidden sm:flex space-x-4 items-center">
            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('pengelolaan') }}" class="hover:underline">Pengelolaan</a>
            <a href="{{ route('profile') }}" class="hover:underline">Profile</a>
            <span class="ml-2 text-sm">{{ session('username') }}</span>
            <a href="{{ route('logout') }}" class="bg-white text-blue-600 px-2 py-1 rounded text-xs hover:bg-gray-100">Logout</a>
        </div>
    </div>


    <div x-show="open" class="sm:hidden px-4 pb-3 space-y-2">
        <a href="{{ route('dashboard') }}" class="block hover:underline">Dashboard</a>
        <a href="{{ route('pengelolaan') }}" class="block hover:underline">Pengelolaan</a>
        <a href="{{ route('profile') }}" class="block hover:underline">Profile</a>
        <div class="flex justify-between items-center pt-2">
            <span class="text-sm">{{ session('username') }}</span>
            <a href="{{ route('logout') }}" class="bg-white text-blue-600 px-2 py-1 rounded text-xs hover:bg-gray-100">Logout</a>
        </div>
    </div>
</nav>
