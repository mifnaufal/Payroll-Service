<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 shadow-md border-b border-gray-200 dark:border-gray-600 fixed top-0 w-full z-50 h-16">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="flex items-center space-x-2">
                        <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span class="text-lg font-bold text-gray-900 dark:text-gray-100 leading-tight">PayrollPro</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                {{ __('DashAdmin') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.pengajuan.index')" :active="request()->routeIs('admin.pengajuan.*')"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200">
                                {{ __('PengajuanAdmin') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.gaji.index')" :active="request()->routeIs('admin.gaji.*')"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                {{ __('GajiAdmin') }}
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('pengajuan.index')" :active="request()->routeIs('pengajuan.*')"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                {{ __('Pengajuan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('gaji.index')" :active="request()->routeIs('gaji.*')"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                {{ __('Gaji') }}
                            </x-nav-link>
                        @endif
                    @else
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')"
                            class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            {{ __('Login') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')"
                            class="text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            {{ __('Register') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-gray-700 dark:border-gray-800 text-sm font-medium rounded-md text-gray-100 dark:text-gray-200 bg-gray-800 dark:bg-gray-900 hover:bg-gray-700 dark:hover:bg-gray-800/50 hover:text-gray-200 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 dark:focus:ring-gray-700 transition ease-in-out duration-150"
                            aria-label="User menu" :aria-expanded="open">
                            @if (Auth::check())
                                <div class="font-medium text-base text-gray-800 dark:text-gray-100">
                                    {{ Auth::user()->name }}</div>
                            @endif
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-800 dark:bg-gray-900">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-100 dark:text-gray-200 hover:bg-gray-700 dark:hover:bg-gray-800/50 hover:text-gray-300 dark:hover:text-gray-300 transition-colors duration-200">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md bg-gray-800 text-gray-100 dark:bg-gray-900 dark:text-indigo-300 hover:bg-gray-700 dark:hover:bg-indigo-900/50 hover:text-gray-200 dark:hover:text-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-400 dark:focus:ring-indigo-500 focus:bg-gray-700 dark:focus:bg-indigo-900/50 transition duration-150 ease-in-out"
                    aria-label="Toggle navigation menu" :aria-expanded="open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-600 transition-all duration-300">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                @if (auth()->user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('DashAdmin') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.pengajuan.index')" :active="request()->routeIs('admin.pengajuan.*')">
                        {{ __('PengajuanAdmin') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('pengajuan.index')" :active="request()->routeIs('pengajuan.*')">
                        {{ __('Pengajuan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('gaji.index')" :active="request()->routeIs('gaji.*')">
                        {{ __('Gaji') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.gaji.index')" :active="request()->routeIs('admin.gaji.*')">
                        {{ __('GajiAdmin') }}
                    </x-responsive-nav-link>
                @endif
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endauth

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-100">
                    {{ Auth::user()->name ?? '' }}
                </div>
                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                    {{ Auth::user()->email ?? '' }}
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
