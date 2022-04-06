<?php

namespace App\Http\Livewire\Variety;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $origin = '';
    public $type = '';
    public $description = '';
    public $use = '';


    protected $listeners = [
        'createVarietyErrorBag' => 'createVarietyErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createVariety', [
            'name' => $this->name,
            'origin_id' => $this->origin,
            'type' => $this->type,
            'description' => $this->description,
            'use' => $this->use,
        ]);
    }

    public function createVarietyErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->origin = '';
        $this->type = '';
        $this->description = '';
        $this->use = '';

    }

    public function render()
    {
        return view('livewire.variety.create-modal');
    }
}
