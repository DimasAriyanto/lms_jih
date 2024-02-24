<div>
    <div wire:model.live.debounce.250ms="search" class="search flex rounded-2xl bg-white w-full">
        <input type="search" name="search" id="search" placeholder="Search Courses"
            class="w-full px-4 text-gray-900 border-none rounded-2xl">
    </div>
    @if (sizeof($pelatihan) > 0)
        <div id="dropdownHover" class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                @foreach ($pelatihan as $p)
                    <li>
                        <a href="{{ route('pelatihan.show', $p->id) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $p->nama }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
