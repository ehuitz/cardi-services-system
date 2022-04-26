<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $name = '';
    public $country = '';

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editDepartmentErrorBag' => 'editDepartmentErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$department = Department::find($this->oid);
			$this->name = $department->name;
			$this->country = $department->country_id;
        }
	}

	public function emitEvent() {
		$this->emit('updateDepartment', [
			'id' => $this->oid,
			'name' => $this->name,

            'country_id' => $this->country == '0' ? null : $this->country,
		]);
	}

	public function editDepartmentErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.department.edit-modal');
    }
}
