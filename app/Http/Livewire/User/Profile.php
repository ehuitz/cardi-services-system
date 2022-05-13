<?php

namespace App\Http\Livewire\Variety;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;


class Author extends Component
{

    use WithFileUploads;

    public $user;

    public function mount() {
        $this->user = auth()->user()->id;

    }


    public function render()
    {
        return view('livewire.user.profile');
    }
}
