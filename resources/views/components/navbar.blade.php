<!-- Header Start -->
<header class="fixed top-0 py-5 left-0 z-10 bg-white flex w-full items-center">
    <div class="container">
        <div class="relative flex items-center justify-between">
            <div class="px-8">
                <a href="#logo" class="flex">
                    <img src="{{asset('images/logo.png')}}" alt="">
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
                            <a href="{{route('index')}}" class="mx-8 flex py-2 text-dark">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="#aboutUs" class="mx-8 flex py-2 text-base text-dark ">Tentang
                                Kami</a>
                        </li>
                        <li class="group">
                            <a href="{{route('pendaftaran.create')}}" class="mx-8 flex py-2 text-base text-dark">Pelatihan</a>
                        </li>
                        <li class="group">
                            <a href="#contact"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Contact</a>
                        </li>
                        <div class="flex self-end gap-4 mx-8">
                            <li class="group">
                                <a href="{{route('filament.app.auth.login')}}">
                                    <button class="btn btn-accent rounded-2xl px-6 py-2 text-white
                                    ">Masuk</button>
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{route('filament.app.auth.register')}}">
                                    <button class="btn btn-accent rounded-2xl px-6 py-2  text-white">Daftar</button>
                                </a>
                            </li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
