@foreach ($data_pelatihan as $pelatihan)
    <div class="card">
        <img src="{{ $pelatihan['image_url'] }}" alt="{{ $pelatihan['nama'] }}" class="rounded-t-2xl">
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
