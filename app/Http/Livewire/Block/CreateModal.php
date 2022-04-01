<?php

namespace App\Http\Livewire\Block;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $location = '';
    public $country = '';
    public $area = '';
    public $description = '';


    protected $listeners = [
        'createBlockErrorBag' => 'createBlockErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createBlock', [
            'location' => $this->location,
            'country_id' => $this->country,
            'area' => $this->area,
            'description' => $this->description,
        ]);
    }

    public function createBlockErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->location = '';
        $this->country = '';
        $this->area = '';
        $this->description = '';

    }

    public function render()
    {
        return view('livewire.block.create-modal');
    }
}
