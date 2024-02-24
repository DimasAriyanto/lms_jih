<div class="w-full lg:flex-row flex-col flex lg:gap-4">
    <div class="lg:w-4/12 h-fit flex gap-8 flex-col bg-white shadow-sm rounded-2xl p-8 mt-5">
        <div class="space-y-4">
            <h1 class="text-2xl font-semibold">Kelas</h1>
            {{-- <div class="flex items-center">
                <form action="#" class="">
                    <p class="flex">
                        <input type="checkbox" value="terbatas" id="test1" name="radio-group">
                        <label for="test1" class="pt-1 text-md font-semibold text-black">Karyawan</label>
                    </p>
                    <p class="pt-4">
                        <input type="checkbox" value="umum" id="test2" name="radio-group">
                        <label for="test2" class="pt-1 text-md font-semibold text-black">Umum</label>
                    </p>
                </form>
            </div> --}}

            <div class="flex items-center mb-4">
                <input wire:model.live.debounce.250ms="jenisPelaksanaan" value="terbatas" id="default-checkbox"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Karyawan</label>
            </div>
            <div class="flex items-center">
                <input wire:model.live.debounce.250ms="jenisPelaksanaan" value="umum" id="default-checkbox"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Umum</label>
            </div>

        </div>
        <div class="space-y-4">
            <h1 class="text-2xl font-semibold">Category</h1>
            @foreach ($catagories as $category)
                <div class="flex items-center mb-4">
                    <input wire:model.live.debounce.250ms="kategori" value="{{ $category['id'] }}" id="default-checkbox"
                        type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category['nama'] }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <!-- section end -->

    <!-- search start -->
    <div class="lg:w-8/12 max-lg:mt-8 lg:mt-4 space-y-3">
        <div class="flex justify-end w-full">
            <div wire:model.live.debounce.250ms="search" class="search flex rounded-2xl bg-white w-full">
                <input type=" search" name="search" id="search" placeholder="Search Courses..."
                    class="w-full border-none px-4 text-gray-900 outline-none rounded-2xl">
            </div>
        </div>
        <!-- search end -->
        <div class="grid gap-4 md:grid-cols-2">
            @foreach ($this->pelatihan as $pelatihan)
                <div wire:key="{{ $pelatihan->id }} class="card">
                    <img src="{{ $pelatihan->image_url }}" alt="" class="rounded-t-2xl w-full">
                    <div class="card-body px-3 py-5 w-full bg-white">
                        <div class="flex">
                            <h2 class="card-title self-start">{{ $pelatihan['nama'] }}</h2>
                            @if ($pelatihan['status_pendaftaran'] == 'buka')
                                <div class="button-open card-actions justify-end shrink-0">
                                    <button class="btn text-sm btn-primary text-white rounded-full px-3">Dibuka</button>
                                </div>
                            @else
                                <div class="button-open card-actions justify-end shrink-0">
                                    <button class="text-sm btn-primary2 text-white rounded-full px-3">Ditutup</button>
                                </div>
                            @endif
                        </div>
                        <h4 class="text-sm text-slate-400 pt-2">Rp {{ $pelatihan['harga'] }}</h4>
                        <div class="flex">
                            <img src="{{ asset('images/clock.svg') }}" alt="clock" class="w-4 pt-3">
                            <h2 class="pt-3 px-2 text-xs font-medium">{{ $pelatihan['tanggal_pelaksanaan'] }}
                                ({{ $pelatihan['jam_mulai'] }} - {{ $pelatihan['jam_selesai'] }} WIB)
                            </h2>
                        </div>
                        <div class="flex">
                            <img src="{{ asset('images/location.svg') }}" alt="clock" class="w-4 pt-3">
                            <h2 class="pt-4 px-2 text-xs">{{ $pelatihan['tempat_pelaksanaan'] }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="my-3">
            {{ $this->pelatihan->onEachSide(1)->links() }}
        </div>
    </div>
</div>
