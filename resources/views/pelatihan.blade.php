<x-layout>
    <!-- section start -->
    <section class="mt-6 mx-8">
        <div class="container">
            <div class="w-full flex">
                <div class="lg:w-1/2">
                    <h1 class="text-3xl font-semibold">Topik <span class="mb-3 text-[#116e63]">Kelas</span></h1>
                </div>
            </div>
            <div class="w-full lg:flex-row flex-col flex lg:gap-4">
                <div class="lg:w-4/12 h-fit flex gap-8 flex-col bg-white shadow-sm rounded-2xl p-8 mt-5">
                    <div class="space-y-4">
                        <h1 class="text-2xl font-semibold">Kelas</h1>
                        <div class="flex items-center">
                            <form action="#" class="">
                                <p class="flex">
                                    <input type="radio" id="test1" name="radio-group" checked>
                                    <label for="test1" class="pt-1 text-md font-semibold text-black">Karyawan</label>
                                </p>
                                <p class="pt-4">
                                    <input type="radio" id="test2" name="radio-group">
                                    <label for="test2" class="pt-1 text-md font-semibold text-black">Umum</label>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h1 class="text-2xl font-semibold">Category</h1>
                        <div class="flex items-center">
                            <form action="#">
                                <p class="flex">
                                    <input type="radio" id="test3" name="radio-group" checked>
                                    <label for="test3" class="pt-1 text-md font-semibold text-black">Pelatihan Anak
                                        Usia Dini</label>
                                </p>
                                <p class="pt-4">
                                    <input type="radio" id="test4" name="radio-group">
                                    <label for="test4" class="pt-1 text-md font-semibold text-black">Pelatihan
                                        Gizi</label>
                                </p>
                                <p class="pt-4">
                                    <input type="radio" id="test5" name="radio-group">
                                    <label for="test5" class="pt-1 text-md font-semibold text-black">Pencegahan
                                        Penyakit Kanker</label>
                                </p>
                                <p class="pt-4">
                                    <input type="radio" id="test6" name="radio-group">
                                    <label for="test6" class="pt-1 text-md font-semibold text-black">Pelatihan
                                        Kesehatan Lansia</label>
                                </p>
                                <p class="pt-4">
                                    <input type="radio" id="test7" name="radio-group">
                                    <label for="test7" class="pt-1 text-md font-semibold text-black">Pencegahan
                                        Penyakit Jantung</label>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- section end -->

                <!-- search start -->
                <div class="lg:w-8/12 max-lg:mt-8 lg:mt-4 space-y-3">
                    <div class="flex justify-end w-full">
                        <div class="search flex rounded-2xl bg-white w-full">
                            <input type=" search" name="search" id="search" placeholder="Search Courses..."
                                class="w-full border-none px-4 text-gray-900 outline-none rounded-2xl">
                            <button class="m-2 rounded-full px-2 py-2 text-white">
                                <img src="{{asset('images/search.svg')}}" alt="" width="25px">
                            </button>
                        </div>
                    </div>
                    <!-- search end -->
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="card">
                            <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl w-full">
                            <div class="card-body px-3 py-5 bg-white">
                                <div class="flex">
                                    <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support
                                    </h2>
                                    <div class="button-open card-actions justify-end shrink-0">
                                        <button
                                            class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
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
                            <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl w-full">
                            <div class="card-body px-3 py-5 bg-white">
                                <div class="flex">
                                    <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support
                                    </h2>
                                    <div class="button-open card-actions justify-end shrink-0">
                                        <button
                                            class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
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
                            <img src="{{asset('images/patient-2.jpg')}}" alt="" class="rounded-t-2xl w-full">
                            <div class="card-body px-3 py-5 bg-white">
                                <div class="flex">
                                    <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support
                                    </h2>
                                    <div class="button-open card-actions justify-end shrink-0">
                                        <button
                                            class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
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
                            <img src="{{asset('images/patient-2.jpg')}}" alt="" class="rounded-t-2xl w-full">
                            <div class="card-body px-3 py-5 bg-white">
                                <div class="flex">
                                    <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support
                                    </h2>
                                    <div class="button-open card-actions justify-end shrink-0">
                                        <button
                                            class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
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
                            <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl w-full">
                            <div class="card-body px-3 py-5 bg-white">
                                <div class="flex">
                                    <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support
                                    </h2>
                                    <div class="button-open card-actions justify-end shrink-0">
                                        <button
                                            class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
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
                            <img src="{{asset('images/patient-1.jpg')}}" alt="" class="rounded-t-2xl w-full">
                            <div class="card-body px-3 py-5 bg-white">
                                <div class="flex">
                                    <h2 class="card-title self-start">Pelatihan Basic Trauma and Cardiac Life Support
                                    </h2>
                                    <div class="button-open card-actions justify-end shrink-0">
                                        <button
                                            class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
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
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
</x-layout>
