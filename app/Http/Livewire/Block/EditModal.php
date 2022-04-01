<?php

namespace App\Http\Livewire\Block;

use App\Models\Block;
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
		'editBlockErrorBag' => 'editBlockErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$block = Block::find($this->oid);
			$this->name = $block->name;
			// $this->deviceModel = $device->model_id;
			$this->country = $block->country_id;
            // $this->serialNumber = $device->serial_number;
            // $this->macAddress = $device->mac_address;
        }
	}

	public function emitEvent() {
		$this->emit('updateBlock', [
			'id' => $this->oid,
			'name' => $this->name,

            'country_id' => $this->country == '0' ? null : $this->country,
		]);
	}

	public function editBlockErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.block.edit-modal');
    }
}
