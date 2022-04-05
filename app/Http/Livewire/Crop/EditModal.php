<?php

namespace App\Http\Livewire\Crop;

use Livewire\Component;
use App\Models\Crop;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
	public $id_;
	public $name;
    public $scientific_name;
    public $use;
    public $type;

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editCropErrorBag' => 'editCropErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->id_ = $params['id'];
			$crop = Crop::find($this->id_);
			$this->name = $crop->name;
            $this->scientific_name = $crop->scientific_name;
            $this->use = $crop->use;
            $this->type = $crop->type;
		}
	}

	public function emitEvent() {
		$this->emit('updateCrop', [
			'id' => $this->id_,
			'name' => $this->name,
            'scientific_name' => $this->scientific_name,
            'use' => $this->use,
            'type' => $this->type,
		]);
	}

	public function editCropErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.crop.edit-modal');
    }
}
