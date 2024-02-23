<!-- Header Start -->
<header class="fixed top-0 py-5 left-0 z-10 bg-white flex w-full items-center">
    <div class="container">
        <div class="relative flex items-center justify-between">
            <div class="px-8">
                <a href="#logo" class="flex">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                    <div class="text-logo">
                        <h1 class="text-3xl py-1 px-4 font-bold">JIH</h1>
                        <h2 class="text-2xl px-4 font-bold">Academy</h2>
                    </div>
                </a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
                    <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                </button>

                <nav id="nav-menu"
                    class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg py-5 shadow-lg dark:bg-dark
                     dark:shadow-slate-500 lg:static font-medium lg:block lg:max-w-full lg:rounded-none lg:bg-white lg:shadow-none lg:dark:bg-white">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a href="{{ route('index') }}" class="mx-8 flex py-2 text-dark">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="#aboutUs" class="mx-8 flex py-2 text-base text-dark ">Tentang
                                Kami</a>
                        </li>
                        <li class="group">
                            <a href="{{ route('pelatihan.index') }}"
                                class="mx-8 flex py-2 text-base text-dark">Pelatihan</a>
                        </li>
                        <li class="group">
                            <a href="#contact"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Contact</a>
                        </li>
                        @guest
                            <div class="flex self-end gap-4 mx-8">
                                <li class="group">
                                    <a href="{{ route('filament.app.auth.login') }}">
                                        <button
                                            class="btn btn-accent rounded-2xl px-6 py-2 text-white
                                    ">Masuk</button>
                                    </a>
                                </li>
                                <li class="group">
                                    <a href="{{ route('filament.app.auth.register') }}">
                                        <button class="btn btn-accent rounded-2xl px-6 py-2  text-white">Daftar</button>
                                    </a>
                                </li>
                            </div>
                        @endguest
                        @auth
                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </button>
                                </div>

                                <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    @if (auth()->user()->role === 'admin')
                                        <a href="{{ route('filament.admin.pages.dashboard') }}"
                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-0">Dashboard</a>
                                    @else
                                        <a href="{{ route('filament.app.pages.dashboard') }}"
                                            class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                            id="user-menu-item-0">Dashboard</a>
                                    @endif
                                    <form action="{{ route('filament.app.auth.logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                            tabindex="-1" id="user-menu-item-2">
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
