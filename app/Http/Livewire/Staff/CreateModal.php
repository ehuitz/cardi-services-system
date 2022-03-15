<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $email = '';
    public $category = [];
    public $country = [];
    public $department = [];

    protected $listeners = [
        'createStaffErrorBag' => 'createStaffErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createStaff', [
            'email' => $this->email,
            'category' => $this->category,
            'country' => $this->country,
            'department' => $this->department

        ]);
    }

    public function createStaffErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->email = '';
        $this->category = '';
        $this->country = '';
        $this->department = '';
    }

    public function render()
    {
        return view('livewire.staff.create-modal');
    }
}
