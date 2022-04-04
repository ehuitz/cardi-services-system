<?php

namespace App\Http\Livewire\Field;

use App\Models\Field;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $name = '';
    public $block = '';
    public $area = '';
    public $description = '';


	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editFieldErrorBag' => 'editFieldErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$field = Field::find($this->oid);
			$this->name = $field->name;
			$this->block = $field->block_id;
            $this->area = $field->area;
            $this->description = $field->description;

        }
	}

	public function emitEvent() {
		$this->emit('updateField', [
			'id' => $this->oid,
			'name' => $this->name,
            'block_id' => $this->block == '0' ? null : $this->block,
            'area' => $this->area,
            'description' => $this->description,
		]);
	}

	public function editFieldErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.field.edit-modal');
    }
}
