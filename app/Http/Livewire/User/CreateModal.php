<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CreateModal extends Modal
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $country = '';

    protected $listeners = [
        'createUserErrorBag' => 'createUserErrorBag',
        'showToggled' => 'resetValues',
        'openCreateModal' => 'show'
    ];

    public function emitEvent() {
        $this->emit('createUser', [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'country' => $this->country
        ]);
    }

    public function createUserErrorBag($errorBag) {
        $this->setErrorBag($errorBag);
    }

    public function resetValues() {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->country = '';
    }

    public function render()
    {
        return view('livewire.user.create-modal');
    }
}
