<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $code = '';
    public $country = '';
    public $type = '';
    public $description = '';



    protected $listeners = [
        'createProjectErrorBag' => 'createProjectErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createProject', [
            'code' => $this->code,
            'name' => $this->name,
            'country_id' => $this->country,
            'type' => $this->type,
            'description' => $this->description,

        ]);
    }

    public function createProjectErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->code = '';
        $this->country = '';
        $this->type = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.project.create-modal');
    }
}
