<?php

namespace App\Http\Livewire\Field;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $block = '';
    public $area = '';
    public $description = '';


    protected $listeners = [
        'createFieldErrorBag' => 'createFieldErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createField', [
            'name' => $this->name,
            'block_id' => $this->block,
            'area' => $this->area,
            'description' => $this->description,
        ]);
    }

    public function createFieldErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->block = '';
        $this->area = '';
        $this->description = '';

    }

    public function render()
    {
        return view('livewire.field.create-modal');
    }
}
