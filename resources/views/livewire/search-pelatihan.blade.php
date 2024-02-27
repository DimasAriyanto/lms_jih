

<div>
    <div class="flex items-center w-full md:w-96 lg:w-96">
    <div wire:model.live.debounce.250ms="search" class="search flex rounded-2xl bg-white w-full ">
        <input type="search" name="search" id="search" placeholder="Search Courses"
            class="w-full px-4 text-gray-900 border-none rounded-2xl">
    </div>
    </div>
    @if (sizeof($pelatihan) > 0)
        <div id="dropdownHover" class="z-10 absolute bg-white divide-y w-full divide-gray-100 rounded-lg shadow dark:bg-gray-700">
            <div class="src">
                <ul class="py-4 text-sm text-gray-700 dark:text-gray-200">
                    @foreach ($pelatihan as $p)
                        <li>
                            <div class="flex p-2 hover:bg-gray-100 dark:hover:bg-gray-600 items-center">
                                <img src="{{asset('images/hero-img.png')}}" alt="" class="w-2/12">
                                <a href="{{ route('pelatihan.show', $p->id) }}"
                                    class="block px-5 py-4  hover:border-1 dark:hover:text-white">{{ $p->nama }}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
