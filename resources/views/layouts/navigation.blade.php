<nav x-data="{ open: false }" class="bg-gray-950/80 backdrop-blur-md border-b border-gray-900 sticky top-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center gap-2 md:gap-3">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo Simphony MB" class="h-7 w-7 md:h-8 md:w-8 object-contain rounded-full shadow-md">

                    <a href="{{ route('dashboard') }}" class="text-base md:text-lg font-black text-amber-500 tracking-widest uppercase transition hover:opacity-80 leading-none">
                        SIMPHONY <span class="text-white font-light">MB</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-amber-400 focus:text-amber-400 border-amber-500 transition duration-150">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-gray-800 text-sm leading-4 font-medium rounded-xl text-gray-300 bg-gray-900/50 hover:text-amber-400 hover:border-amber-500/30 focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1.5 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-900 border border-gray-800 rounded-xl py-1 shadow-xl">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-300 hover:bg-gray-800 hover:text-amber-400">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="text-red-400 hover:bg-gray-800 hover:text-red-300"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-amber-400 hover:bg-gray-900/60 border border-transparent hover:border-gray-800 focus:outline-none transition duration-200 cursor-pointer">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="hidden sm:hidden bg-gray-950 border-b border-gray-900">

        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl pl-3 pr-4 py-2.5 text-gray-300 hover:text-amber-400 hover:bg-gray-900/40 active:bg-gray-900">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-4 border-t border-gray-900 bg-gray-900/20">
            <div class="px-5 mb-3">
                <div class="font-bold text-sm text-white tracking-wide">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-gray-500 mt-0.5">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1 px-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl pl-3 pr-4 py-2.5 text-gray-400 hover:text-amber-400 hover:bg-gray-900/40">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="rounded-xl pl-3 pr-4 py-2.5 text-red-400 hover:text-red-300 hover:bg-red-950/20"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
