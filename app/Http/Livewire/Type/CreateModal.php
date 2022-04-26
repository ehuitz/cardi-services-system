<?php

namespace App\Http\Livewire\Type;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $code = '';

    protected $listeners = [
        'createTypeErrorBag' => 'createTypeErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createType', [
            'name' => $this->name,
            'code' => $this->code
        ]);
    }

    public function createTypeErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->code = '';
    }

    public function render()
    {
        return view('livewire.type.create-modal');
    }
}
