<?php

namespace App\Http\Livewire\StoredVariety;

use App\Models\StoredVariety;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $vfid = '';
    public $storage = '';
    public $variety_field = '';
    public $variety = '';
    public $quantity = '';
    public $date = '';
    public $description = '';

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editStoredVarietyErrorBag' => 'editStoredVarietyErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->vfid = $params['id'];
			$storedVariety = StoredVariety::find($this->vfid);
            $this->storage = $storedVariety->storage;
            $this->variety_field = $storedVariety->variety_field;
			$this->variety = $storedVariety->variety_id;
            $this->quantity = $storedVariety->quantity;
            $this->description = $storedVariety->description;
        }
	}

	public function emitEvent() {
		$this->emit('updateStoredVariety', [
            'id' => $this->vfid,
            'storage' => $this->storage == '0' ? null : $this->storage,
            'variety_field' => $this->variety_field == '0' ? null : $this->variety_field,
            'variety_id' => $this->variety == '0' ? null : $this->variety,
            'quantity' => $this->quantity,
            'description' => $this->description,
		]);
	}

	public function editStoredVarietyErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.stored-variety.edit-modal');
    }
}
