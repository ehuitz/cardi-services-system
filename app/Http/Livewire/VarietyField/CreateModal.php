<?php

namespace App\Http\Livewire\VarietyField;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $variety = '';
    public $field = '';
    public $start_date = '';
    public $description = '';


    protected $listeners = [
        'createVarietyFieldErrorBag' => 'createVarietyFieldErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createVarietyField', [
            'variety_id' => $this->variety,
            'field_id' => $this->field,
            'start_date' => $this->start_date,
            'description'=> $this->description
        ]);
    }

    public function createVarietyFieldErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {

        $this->variety = '';
        $this->field = '';
        $this->start_date = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.variety-field.create-modal');
    }
}
