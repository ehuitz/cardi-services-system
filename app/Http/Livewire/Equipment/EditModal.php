<?php

namespace App\Http\Livewire\Equipment;

use App\Models\Device;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $ogAsset = '';
    public $assetTag = '';
    public $acquired_at = '';
    public $model_no = '';
    public $department = '';
    public $project = '';
    public $serialNumber = '';
    public $macAddress = '';

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editEquipmentErrorBag' => 'editEquipmentErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->ogAsset = $params['id'];
			$device = Device::find($this->ogAsset);
			$this->assetTag = $device->asset_tag;
            $this->acquired_at = $device->acquired_at;
            $this->model_no = $device->model_no;
			$this->department = $device->department_id;
            $this->project = $device->project_id;
            $this->serialNumber = $device->serial_number;
            $this->macAddress = $device->mac_address;
        }
	}

	public function emitEvent() {
		$this->emit('updateEquipment', [
			'og_asset' => $this->ogAsset,
			'asset_tag' => $this->assetTag,
            'acquired_at' => $this->acquired_at,
            'model_no' => $this->model_no,
            'department' => $this->department == '0' ? null : $this->department,
            'project' => $this->project == '0' ? null : $this->project,
            'serial_number' => $this->serialNumber,
            'mac_address'=> $this->macAddress
		]);
	}

	public function editEquipmentErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.equipment.edit-modal');
    }
}
