<?php

namespace App\Http\Livewire\Origin;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $institution = '';
    public $country = '';
    public $location = '';
    public $intro_name = '';
    public $belizean_name = '';
    public $description = '';


    protected $listeners = [
        'createOriginErrorBag' => 'createOriginErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createOrigin', [
            'institution' => $this->institution,
            'country_id' => $this->country,
            'location' => $this->location,
            'intro_name' => $this->intro_name,
            'belizean_name' => $this->belizean_name,
            'description' => $this->description,
        ]);
    }

    public function createOriginErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->institution = '';
        $this->country = '';
        $this->location = '';
        $this->intro_name = '';
        $this->belizean_name = '';
        $this->description = '';

    }

    public function render()
    {
        return view('livewire.origin.create-modal');
    }
}
