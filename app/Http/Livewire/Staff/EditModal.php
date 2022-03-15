<?php

namespace App\Http\Livewire\Staff;

use App\Models\Staff;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $id_ = '';
    public $email = '';
    public $category = [];
    public $country = [];
    public $department = [];

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editStaffErrorBag' => 'editStaffErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->id_ = $params['id'];
			$staff = Staff::find($this->id_);
            $this->email = $staff->user->email;
			$this->category = $staff->categories->pluck('id');
			$this->country = $staff->countries->pluck('id');
            $this->department = $staff->departments->pluck('id');
        }
	}

	public function emitEvent() {
		$this->emit('updateStaff', [
			'id' => $this->id_,
			'email' => $this->email,
            'category' => $this->category,
            'country' => $this->country,
            'department' => $this->department
		]);
	}

	public function editStaffErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.staff.edit-modal');
    }
}
