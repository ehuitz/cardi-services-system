<?php

namespace App\Http\Livewire\StoredVariety;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $storage = '';
    public $variety_field = '';
    public $variety = '';
    public $quantity = '';
    public $date = '';
    public $description = '';


    protected $listeners = [
        'createStoredVarietyErrorBag' => 'createStoredVarietyErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createStoredVariety', [
            'storage_id' => $this->storage,
            'variety_field_id' => $this->variety_field,
            'variety_id' => $this->variety,
            'date' => $this->date,
            'description'=> $this->description
        ]);
    }

    public function createStoredVarietyErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {

        $this->storage = '';
        $this->variety_field = '';
        $this->variety = '';
        $this->quantity = '';
        $this->date = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.stored-variety.create-modal');
    }
}
