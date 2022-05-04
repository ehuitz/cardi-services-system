<?php

namespace App\Http\Livewire\Variety;

use App\Models\Variety;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $name = '';
    public $origin = '';
    public $crop = '';
    public $type = '';
    public $description = '';
    public $use = '';


	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editVarietyErrorBag' => 'editVarietyErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$variety = Variety::find($this->oid);
			$this->name = $variety->name;
			$this->origin = $variety->origin_id;
            $this->crop = $variety->crop_id;
            $this->type = $variety->type;
            $this->description = $variety->description;
            $this->use = $variety->use;

        }
	}

	public function emitEvent() {
		$this->emit('updateVariety', [
			'id' => $this->oid,
			'name' => $this->name,
            'origin_id' => $this->origin == '0' ? null : $this->origin,
            'crop_id' => $this->crop == '0' ? null : $this->crop,
            'type' => $this->type,
            'description' => $this->description,
            'use' => $this->use,
		]);
	}

	public function editVarietyErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.variety.edit-modal');
    }
}
