<nav x-data="{ open: false, searchOpen: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart')">
                        {{ __('Cart') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('about us')" :active="request()->routeIs('about us')">
                        {{ __('About Us') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('contact us')" :active="request()->routeIs('contact us')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>

            </div>

            {{-- Menu right --}}
            <div class="flex ms-auto items-center gap-2">
                {{-- Search --}}
                <div>
                    <button x-show="!searchOpen"
                        @click="searchOpen = true">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1 0 5.5 5.5a7.5 7.5 0 0 0 11.15 11.15Z"
                            />
                        </svg>

                    </button>

                    <button
                        x-show="searchOpen"
                        @click="searchOpen = false"
                    >
                        X
                    </button>
                </div>

                <div x-show="searchOpen" @click.away="searchOpen = false"
                    class="
                        absolute lg:static
                        right-0 top-0
                        z-50
                        w-full
                        bg-white
                        p-3 lg:p-0
                    ">
                    <form action="{{ route('home') }}" method="GET">
                        <div class="flex items-center border rounded-md px-2 py-1">

                            <i data-feather="search" class="w-4 h-4 text-gray-400"></i>

                            <input
                                type="text"
                                name="keyword"
                                placeholder="Tìm sản phẩm..."
                                class="w-full border-none focus:ring-0 text-sm ml-2"
                                autofocus
                            >

                            <button type="submit">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-5 h-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1 0 5.5 5.5a7.5 7.5 0 0 0 11.15 11.15Z"
                                    />
                                </svg>
                            </button>

                        </div>
                    </form>

                </div>

                <div class="mb-1">
                    <a href="{{ route('cart.index') }}" class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835L5.76 7.5m0 0L7.5
                                15h9.75l1.74-7.5H5.76zm1.74 10.5a1.125 1.125 0 100 2.25 1.125
                                1.125 0 000-2.25zm10.5 0a1.125 1.125 0 100 2.25 1.125 1.125 0
                                000-2.25z" />
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs
                            w-5 h-5 rounded-full flex items-center justify-center"
                        >
                            {{ $cartCount }}
                        </span>
                    </a>
                </div>

                <div class="mb-1">
                    <a href="{{ route('login') }}" class="relative">
                        @auth
                        <div class="flex">
                            <x-dropdown-link :href="route('dashboard')">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                {{ __('Dashboard') }}
                            </x-dropdown-link>

                        </div>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            strokeWidth={1.5} stroke="currentColor" class="size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75
                                0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998
                                0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        @endauth
                    </a>
                </div>
                <div class="mb-1">
                    @auth
                    <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5
                                    3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5
                                    21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                            </x-dropdown-link>
                        </form>
                    @endauth
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center
                justify-center p-2 rounded-md text-gray-400 hover:text-gray-500
                hover:bg-gray-100 focus:outline-none focus:bg-gray-100
                focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                        class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                        class="hidden" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- MOBILE LEFT MENU --}}
    <div
        x-show="open"
        x-transition
        class="sm:hidden border-t border-gray-100 bg-white">

        <div class="px-4 py-3 space-y-1">

            <x-responsive-nav-link
                :href="route('home')"
                :active="request()->routeIs('home')">

                {{ __('Home') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('cart.index')"
                :active="request()->routeIs('cart.index')">

                {{ __('Cart') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('about us')"
                :active="request()->routeIs('about us')">

                {{ __('About Us') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('contact us')"
                :active="request()->routeIs('contact us')">

                {{ __('Contact Us') }}
            </x-responsive-nav-link>

        </div>
    </div>
</nav>


<section class="relative overflow-hidden py-10 bg-linear-90 from-cyan-200 via-sky-100 to-blue-200">

    <h3 class="text-4xl font-extrabold tracking-wide text-orange-400 text-center">
        {{ str(Route::currentRouteName())->before('.')->title() }}
    </h3>
</section>
