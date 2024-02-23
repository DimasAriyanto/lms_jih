<x-layout>
    <!-- WA start -->
    <div>
        <a href="https://api.whatsapp.com/send?phone=6285392042530"
            class="btn-floating whatsapp font-semibold tracking-wide align-middle transition duration-300 ease-in-out p-0 inline-flex items-center text-center justify-center text-sm rounded-full border hover:opacity-80 bg-[#116e63] ">
            <img src="{{ asset('images/logo_WA.png') }}" alt="" class="w-full">
        </a>
    </div>
    <!-- WA end -->
    <!-- hero section start -->
    <section id="Beranda" class="pt-44 mb-5">
        <div class="container">
            <div class="flex flex-wrap px-8">
                <div class=" text-head w-full self-center lg:w-1/2">
                    <h1 class="text-4xl font-semibold">Learning Management<span class="block mb-3">System</span></h1>
                    <p class="font-semibold text-slate-500 mb-10">Media Pembelajaran Daring Diklat RS JIH Yogyakarta
                    </p>
                    <livewire:search-pelatihan />
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="hero-img relative mt-10 lg:mt-0 lg:right-0">
                        <img src="{{ asset('images/hero-img.png') }}" alt="Wahyu Anang" class="mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->

    <!-- About Us start -->
    <section id="aboutUs" class="pt-32 mb-20">
        <div class="container">
            <div class="flex flex-wrap px-8">
                <div class=" text-head w-full self-center lg:w-1/2">
                    <h1 class="text-3xl font-bold text-black">About The <span class="text-head">System</span></h1>
                    <p class="font-medium text-slate-500 mb-10 pt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Voluptates, ab a. Beatae explicabo enim culpa cum vero? Aut, odio iusto?Lorem ipsum dolor sit
                        amet consectetur, adipisicing elit. Repellat, odit dignissimos perferendis impedit minus
                        laudantium. Placeat.
                    </p>
                    <div class="block space-y-2">
                        <div class="check-circle flex">
                            <a href="#" target="_blank"
                                class="w-8 h-8 mr-3 rounded-full flex justify-center items-center border">
                                <img src="{{ asset('images/check.svg') }}" alt="">
                            </a>
                            <p class="py-1 text-base text-black font-semibold">Buka Senin-Sabtu</p>
                        </div>
                        <div class="check-circle flex">
                            <a href="#" target="_blank"
                                class="w-8 h-8 mr-3 rounded-full flex justify-center items-center border">
                                <img src="{{ asset('images/check.svg') }}" alt="">
                            </a>
                            <p class="py-1 text-base text-black font-semibold">Pelatihan Online</p>
                        </div>
                        <div class="check-circle flex">
                            <a href="#" target="_blank"
                                class="w-8 h-8 mr-3 rounded-full flex justify-center items-center border">
                                <img src="{{ asset('images/check.svg') }}" alt="">
                            </a>
                            <p class="py-1 text-base text-black font-semibold">Pelatihan Terjamin</p>
                        </div>
                        <div class="pt-4">
                            <a href="#" class="button-view">
                                <button
                                    class="btn rounded-2xl px-8 py-2 text-base text-white font-semibold hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out ">View
                                    All</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="hero-about relative mt-10 lg:mt-0 lg:right-0">
                        <img src="{{ asset('images/about-img.png') }}" alt="" class="mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us end -->

    <!-- Popular Category start -->
    <section id="PopularCategory" class="pt-28 mb-32">
        <div class="container">
            <div class="px-8">
                <h2 class="text-lg font-semibold mb-4">We do Things Differently</h2>
                <div class="flex gap-4">
                    <div
                        class="box-border text-white rounded-bl-3xl text-center rounded-tr-3xl h-23 w-32  bg-[#116E63]">
                        <h1 class="pt-8 font-semibold text-3xl">2000</h1>
                        <p class="font-medium pt-2">User</p>
                    </div>
                    <div class="box-border text-white rounded-bl-3xl rounded-tr-3xl text-center h-32 w-32 bg-[#133781]">
                        <h1 class="pt-8 font-semibold text-3xl">2000</h1>
                        <p class="font-medium pt-2">User</p>
                    </div>
                </div>
                <div class="flex pt-3 gap-4">
                    <div class="box-border text-white rounded-bl-3xl rounded-tr-3xl text-center h-32 w-32 bg-[#133781]">
                        <h1 class="pt-8 font-semibold text-3xl">2000</h1>
                        <p class="font-medium pt-2">User</p>
                    </div>
                    <div class="box-border text-white rounded-bl-3xl rounded-tr-3xl text-center h-32 w-32 bg-[#116E63]">
                        <h1 class="pt-8 font-semibold text-3xl">2000</h1>
                        <p class="font-medium pt-2">User</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Category end -->

    <!-- training Courses start -->
    <section id="pelatihan" class="pt-32">
        <div class="container">
            <div class="block relative px-8">
                <h1 class="text-3xl font-bold text-black">Training <span class="text-head">Courses</span></h1>
                <div class="flex">
                    <h2 class="font-semibold">List and detail courses</h2>
                    <a href="#">
                        <img src="{{ asset('images/arrow.svg') }}" alt="">
                    </a>
                </div>
                <div class="gap-4 justify-center lg:flex sm:block md:flex">
                    @include('components.card-pelatihan')
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- training Course end -->


</x-layout>
