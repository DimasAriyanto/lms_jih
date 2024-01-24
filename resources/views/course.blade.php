<x-layouts.app>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">List Pelatihan</h2>
            @error('error')
                <div class="mt-2 alert alert-danger">{{ $message }}</div>
            @enderror
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($pelatihan as $p)
                    <div class="group relative">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="{{ $p->image_url }}" alt="Front of men&#039;s Basic Tee in black."
                                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>

                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    {{ $p->nama }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $p->deskripsi }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{ $p->harga }}</p>
                        </div>
                        <form action="{{ route('course.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="pelatihan_id" value="{{ $p->id }}">
                            <button type="submit"
                                class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ikut
                                Pelatihan</button>
                        </form>
                    </div>

                    <!-- More products... -->
                @endforeach
            </div>

        </div>
    </div>

</x-layouts.app>
