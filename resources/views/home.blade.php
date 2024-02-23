<x-layout>

    <!-- WA start -->
    <div>
        <a href="https://api.whatsapp.com/send?phone=6285392042530" class="btn-floating whatsapp font-semibold tracking-wide align-middle transition duration-300
            ease-in-out p-0 inline-flex items-center text-center justify-center text-sm rounded-full bg-[#116e63] ">
            <img src="{{asset('images/logo_WA.png')}}" alt=""
                class="w-full hover:rotate-12 hover:scale-110 transition-transform ease-in-out duration-300">
        </a>
    </div>
    <!-- WA end -->
   <!-- hero section start -->
   <section id="Beranda" class="bg-[#116e63]">
    <div class="container">
        <div class="flex flex-wrap px-8 p-20">
            <div class=" w-full self-center lg:w-1/2 md:6/12">
                <h1 class="text-4xl font-semibold text-white">Learning Management<span
                        class="block mb-3">System</span></h1>
                <p class="font-semibold text-white pb-4">Media Pembelajaran Daring Diklat RS JIH Yogyakarta
                </p>
                <!-- search start -->
                <div class="flex items-center w-full md:w-6/12 lg:w-10/12">
                    <div class="search flex rounded-2xl bg-white w-full">
                        <input type=" search" name="search" id="search" placeholder="Search Courses..."
                            class="w-full border-none px-4 text-gray-900 outline-none rounded-2xl">
                        <button class="m-2 rounded-2xl px-3 py-2 text-white">
                            search
                        </button>
                    </div>
                </div>
                <!-- search end -->
            </div>
            <div class="w-full px-4 lg:w-1/2 pb-10">
                <div class="hero-img relative mt-10 lg:mt-0 md:6/12 lg:right-0">
                    <img src="{{asset('images/hero-img.png')}}" alt="Wahyu Anang" width="lg:w-6/12 ">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero section end -->

<!-- participant start -->
<section id="PopularCategory" class="pt-28">
    <div class="container">
        <div class="relative bottom-44 ">
            <div class="absolute flex lg:gap-40 w-full justify-center user">
                <div class="box-border text-[#133781] shadow-lg text-center rounded-3xl h-28 w-40 bg-white ">
                    <h1 class="pt-6 font-semibold text-[#133781] lg:text-3xl sm:text-lg">2000</h1>
                    <p class="font-medium pt-2 text-base text-[#133781]">User</p>
                </div>
                <div class="box-border text-[#133781] shadow-lg rounded-3xl text-center h-28 w-40 bg-white ">
                    <h1 class="pt-6 font-semibold text-[#133781] lg:text-3xl sm:text-base">2000</h1>
                    <p class="font-medium text-base pt-2 text-[#133781]">User</p>
                </div>
                <div class="box-border text-[#133781] shadow-lg rounded-3xl text-center h-28 w-40 bg-white ">
                    <h1 class="pt-6 font-semibold text-[#133781] lg:text-3xl sm:text-base">2000</h1>
                    <p class="font-medium text-base pt-2 text-[#133781]">User</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- participant end -->

<!-- About Us start -->
<section id="aboutUs" class="pt-32 mb-20">
    <div class="container ">
        <div class="flex flex-wrap w-full justify-between">
            <div class="text-head px-8 self-center lg:w-6/12">
                <h1 class="text-3xl font-bold text-black">About The <span class="text-[#116e63]">System</span></h1>
                <p class="font-medium mb-10 pt-3 text-[#116e63]">Lorem ipsum dolor sit amet
                    consectetur adipisicing
                    elit.
                    Voluptates, ab a. Beatae explicabo enim culpa cum vero? Aut, odio iusto?Lorem ipsum dolor sit
                    amet consectetur, adipisicing elit. Repellat, odit dignissimos perferendis impedit minus
                    laudantium. Placeat.
                </p>
                <div class="block space-y-2">
                    <div class="flex">
                        <a href="#" target="_blank"
                            class="w-8 h-8 mr-3 rounded-full bg-[#116e63] flex justify-center items-center border">
                            <img src="{{asset('images/check.svg')}}" alt="" class="h-12">
                        </a>
                        <p class="py-1 text-base text-black font-semibold">Buka Senin-Sabtu</p>
                    </div>
                    <div class="flex">
                        <a href="#" target="_blank"
                            class="w-8 h-8 mr-3 rounded-full bg-[#116e63] flex justify-center items-center border">
                            <img src="{{asset('images/check.svg')}}" alt="" class="h-12">
                        </a>
                        <p class="py-1 text-base text-black font-semibold">Pelatihan Online</p>
                    </div>
                    <div class="flex">
                        <a href="#" target="_blank"
                            class="w-8 h-8 mr-3 rounded-full bg-[#116e63] flex justify-center items-center border">
                            <img src="{{asset('images/check.svg')}}" alt="" class="h-12">
                        </a>
                        <p class="py-1 text-base text-black font-semibold">Pelatihan Terjamin</p>
                    </div>
                    <div class="pt-4">
                        <a href="#">
                            <button
                                class="btn rounded-2xl bg-[#116e63] px-8 py-2 text-base text-white font-semibold hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out ">Learn
                                more</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="px-8 lg:w-6/12">
                <div class="hero-about relative mt-10 lg:mt-0 lg:right-0">
                    <video class="w-[450px] h-80" controls>
                        <source src="{{asset('images/test.mp4')}}" type="video/mp4" class="mx-auto">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us end -->


<!-- training courses start-->
<div class="pt-36 mx-auto" id="pelatihan">
    <h1 class="text-3xl px-8 font-bold text-black">Training <span class="text-[#116e63]">Courses</span></h1>
    <div class="flex">
        <h2 class="font-semibold px-8 ">List and detail courses</h2>
        <a href="#">
            <img src="{{asset('images/arrow.svg')}}" alt="">
        </a>
    </div>
    <div class="relative">
        <div class="my-slider px-4 flex">
            <div class="card">
                <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl">
                <div class="card-body px-3 py-5 w-full bg-white">
                    <div class="flex">
                        <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support</h2>
                        <div class="button-open card-actions justify-end shrink-0">
                            <button class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
                        </div>
                    </div>
                    <h4 class="text-sm text-slate-400 pt-2">Rp 100.000</h4>
                    <div class="flex">
                        <img src="{{asset('images/clock.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-3 px-2 text-xs font-medium">Senin - Sabtu (08:00 - 12:00 WIB)</h2>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/location.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-4 px-2 text-xs">Via Zoom</h2>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('images/patient-2.jpg')}}" alt="" class="rounded-t-2xl">
                <div class="card-body px-3 py-5 w-full bg-white">
                    <div class="flex">
                        <h2 class="card-title self-start">Pelatihan Dasar Persalinan Untuk Ibu Hamil</h2>
                        <div class="button-open card-actions justify-end shrink-0">
                            <button class="text-sm btn-primary2 text-white rounded-full px-3">Ditutup</button>
                        </div>
                    </div>
                    <h4 class="text-sm text-slate-400 pt-2">Rp 100.000</h4>
                    <div class="flex">
                        <img src="{{asset('images/clock.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-3 px-2 text-xs font-medium">Senin - Sabtu (08:00 - 12:00 WIB)</h2>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/location.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-4 px-2 text-xs">Via Zoom</h2>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl">
                <div class="card-body px-3 py-5 w-full bg-white">
                    <div class="flex">
                        <h2 class="card-title self-start">Pelatihan Dasar Kesehatan Kepada Ibu
                            Lansia</h2>
                        <div class="button-open card-actions justify-end shrink-0">
                            <button class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
                        </div>
                    </div>
                    <h4 class="text-sm text-slate-400 pt-2">Rp 100.000</h4>
                    <div class="flex">
                        <img src="{{asset('images/clock.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-3 px-2 text-xs font-medium">Senin - Sabtu (08:00 - 12:00 WIB)</h2>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/location.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-4 px-2 text-xs">Via Zoom</h2>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('images/patient-2.jpg')}}" alt="" class="rounded-t-2xl">
                <div class="card-body px-3 py-5 w-full bg-white">
                    <div class="flex">
                        <h2 class="card-title self-start">Pemberian Makanan Bergizi Kepada Anak</h2>
                        <div class="button-open card-actions justify-end shrink-0">
                            <button class="btn text-sm btn-primary2 text-white rounded-full px-3">Ditutup</button>
                        </div>
                    </div>
                    <h4 class="text-sm text-slate-400 pt-2">Rp 100.000</h4>
                    <div class="flex">
                        <img src="{{asset('images/clock.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-3 px-2 text-xs font-medium">Senin - Sabtu (08:00 - 12:00 WIB)</h2>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/location.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-4 px-2 text-xs">Via Zoom</h2>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl">
                <div class="card-body px-3 py-5 w-full bg-white">
                    <div class="flex">
                        <h2 class="card-title self-start">Pelatihan Dasar Pencegahan Serangan Jantung</h2>
                        <div class="button-open card-actions justify-end shrink-0">
                            <button class="btn text-sm btn-primary2 text-white rounded-full px-3">Ditutup</button>
                        </div>
                    </div>
                    <h4 class="text-sm text-slate-400 pt-2">Rp 100.000</h4>
                    <div class="flex">
                        <img src="{{asset('images/clock.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-3 px-2 text-xs font-medium">Senin - Sabtu (08:00 - 12:00 WIB)</h2>
                    </div>
                    <div class="flex">
                        <img src="{{asset('images/location.svg')}}" alt="clock" class="w-4 pt-3">
                        <h2 class="pt-4 px-2 text-xs">Via Zoom</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prev-next start-->
        <div id="controls" class="w-full bottom-52 px-8 absolute justify-between flex">
            <button id="prev" class="bg-white h-12 w-12 p-3 rounded-full hover:text-white">
                <img src="{{asset('images/chevron-left.svg')}}" alt="" class="mx-1 h-5">
            </button>
            <button id="next" class="bg-white h-12 w-12 p-3 rounded-full hover:text-white">
                <img src="{{asset('images/chevron-right.svg')}}" alt="" class="mx-2 h-5">
            </button>
        </div>
        <!-- prev-next end -->
    </div>
</div>
<!-- training courses end-->

 <!-- script slider start -->
 <script type="module">
    var slider = tns({
        gutter: 2,
        axis: 'horizontal',
        container: '.my-slider',
        items: 3,
        controls: true,
        slideBy: 'page',
        autoplay: true,
        prevButton: '#prev',
        nextButton: '#next',
        autoplayButtonOutput: false,
        autoplayTimeout: 4500,
        speed: 3500,
        responsive: {
            320: {
                edgePadding: 15,
                gutter: 20,
                items: 1
            },
            370: {
                edgePadding: 15,
                gutter: 20,
                items: 1
            },
            700: {
                edgePadding: 15,
                gutter: 30,
                items: 2
            },
            900: {
                edgePadding: 15,
                items: 3
            }
        }
    });
</script>
<!-- script slider start -->

<script src="/JS/main.js"></script>

<!-- flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<!-- cdn tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- tiny-slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

</x-layout>
