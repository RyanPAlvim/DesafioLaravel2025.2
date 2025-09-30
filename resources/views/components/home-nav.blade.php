<!-- filepath: resources/views/components/home-nav.blade.php -->
<nav x-data="{ open: false }" class="pt-5 bg-blue-500 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 gap-4">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-20 w-auto fill-current text-gray-800 dark:text-gray-200 mb-4" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Página Inicial') }}
                    </x-nav-link>
                    @auth
                    <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')" >
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @endauth
                </div>
            </div>

            <form method="GET" action="{{ route('home') }}" class="flex items-center w-full max-w-xs ml-4 ms-4 me-4 relative">
                <div class="flex w-full ">
                    <input type="text" name="search" placeholder="🔍 Buscar..." value="{{ request('search') }}"
                        class="placeholder-input w-full bg-white text-black px-3 py-2 rounded-l-3xl rounded-r-none border border-white focus:z-10"/>
                    <div x-data="{ open: false }" class="relative">
                        <button type="button" @click="open = !open"
                            class="px-4 py-2 rounded-r-3xl rounded-l-none border-l border-l-1 border-gray-400 bg-white text-black text-xs flex items-center gap-1 hover:bg-blue-100 focus:z-20 h-full"
                            style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                            <span>
                                @php
                                    $catName = 'Categoria';
                                    if(request('category') && isset($categories)) {
                                        $cat = $categories->firstWhere('id', request('category'));
                                        if($cat) $catName = $cat->name;
                                    }
                                @endphp
                                {{ $catName }}
                            </span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute z-20 mt-1 right-0 w-40 bg-white rounded shadow border border-gray-200 min-h-[60px]">
                            <a href="{{ route('home', array_merge(request()->except('category'), ['category' => ''])) }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-100 {{ !request('category') ? 'font-bold' : '' }}">Todas categorias</a>
                            @isset($categories)
                                @foreach($categories as $cat)
                                    <a href="{{ route('home', array_merge(request()->except('category'), ['category' => $cat->id])) }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-blue-100 {{ request('category') == $cat->id ? 'font-bold' : '' }}">{{ $cat->name }}</a>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </form>

            <!-- Settings Dropdown or Auth Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
            @else
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-violet-800 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Entrar
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-800 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-2">
                    Registrar-se
                </a>
            @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options or Auth Links -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-white dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white bg-transparent hover:bg-blue-700">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" class="text-red-400 bg-transparent hover:bg-blue-700"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded bg-sky-800 text-white hover:bg-sky-700">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded bg-green-700 text-white hover:bg-green-600">
                        Registrar-se
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>