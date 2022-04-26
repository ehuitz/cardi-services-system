<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
	public $id_ = '';
	public $name = '';
	public $email = '';
	public $country = '';
    public $type = '';
    public $role = [];


	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editUserErrorBag' => 'editUserErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->id_ = $params['id'];
			$user = User::find($this->id_);
			$this->name = $user->name;
			$this->email = $user->email;
			$this->country = $user->country_id;
            $this->type = $user->type_id;
            $this->role = $user->roles->pluck('id');

		}
	}

	public function emitEvent() {
		$this->emit('updateUser', [
			'id' => $this->id_,
			'name' => $this->name,
			'email' => $this->email,
			'country' => $this->country,
            'type' => $this->type,
            'role' => $this->role
		]);
	}

	public function editUserErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.user.edit-modal');
    }
}
