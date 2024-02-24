<?php

namespace App\Livewire;

use App\Models\Kategori;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PelatihanList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    #[Url()]
    public $jenisPelaksanaan = [];

    #[Url()]
    public $kategori = [];

    #[Computed()]
    public function pelatihan()
    {
        return Pelatihan::with('kategori')
            ->when(sizeof($this->jenisPelaksanaan) > 0, function ($query) {
                $query->where('jenis_pelaksanaan', $this->jenisPelaksanaan);
            })
            ->when(sizeof($this->kategori) > 0, function ($query) {
                $query->whereHas('kategori', function ($query) {
                    $query->where('id', $this->kategori);
                });
            })
            ->where('nama', 'like', '%' . $this->search . '%')
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.pelatihan-list', [
            'catagories' => Kategori::all()
        ]);
    }
}
