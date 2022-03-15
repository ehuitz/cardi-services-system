<?php

namespace App\Http\Livewire\Country;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';

    protected $listeners = [
        'createCountryErrorBag' => 'createCountryErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createCountry', [
            'name' => $this->name
        ]);
    }

    public function createCountryErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.country.create-modal');
    }
}
