<?php

namespace App\Http\Livewire\Crop;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $scientific_name = '';
    public $use = '';
    public $type = '';

    protected $listeners = [
        'createCropErrorBag' => 'createCropErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createCrop', [
            'name' => $this->name,
            'scientific_name' => $this->scientific_name,
            'use' => $this->use,
            'type' => $this->type
        ]);
    }

    public function createCropErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->scientific_name = '';
        $this->use = '';
        $this->type = '';
    }

    public function render()
    {
        return view('livewire.crop.create-modal');
    }
}
