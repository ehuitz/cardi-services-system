<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $name = '';
    // public $deviceModel = '';
    public $country = '';
    // public $serialNumber = '';
    // public $macAddress = '';

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
			// $this->deviceModel = $device->model_id;
			$this->country = $department->country_id;
            // $this->serialNumber = $device->serial_number;
            // $this->macAddress = $device->mac_address;
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
