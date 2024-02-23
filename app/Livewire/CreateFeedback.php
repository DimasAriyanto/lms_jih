<?php

namespace App\Livewire;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateFeedback extends Component
{
    #[Validate('required')]
    public $uraian = '';

    public function save()
    {
        if (auth()->guest()) {
            return $this->redirect(route('filament.app.auth.login'), true);
        }

        Feedback::create([
            'uraian' => $this->uraian,
            'user_id' => Auth::user()->id
        ]);

        return $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.create-feedback');
    }
}
