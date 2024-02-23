<?php

namespace App\Livewire;

use App\Models\Pelatihan;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchPelatihan extends Component
{
    #[Url()]
    public $search = '';

    public function render()
    {
        $results = [];
        if (strlen($this->search) >= 1) {
            $results = Pelatihan::where('nama', 'like', '%' . $this->search . '%')->limit(5)->get();
        }

        return view('livewire.search-pelatihan', [
            'pelatihan' => $results,
        ]);
    }
}
