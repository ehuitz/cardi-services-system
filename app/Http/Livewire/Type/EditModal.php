<?php

namespace App\Http\Livewire\Type;

use Livewire\Component;
use App\Models\Type;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
	public $id_;
	public $name;
    public $code;

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editTypeErrorBag' => 'editTypeErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->id_ = $params['id'];
			$type = Type::find($this->id_);
			$this->name = $type->name;
            $this->code = $type->code;
		}
	}

	public function emitEvent() {
		$this->emit('updateType', [
			'id' => $this->id_,
			'name' => $this->name,
            'code' => $this->code
		]);
	}

	public function editTypeErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.type.edit-modal');
    }
}
