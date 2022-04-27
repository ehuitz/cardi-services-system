<?php

namespace App\Http\Livewire\VarietyField;

use App\Models\VarietyField;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $vfid = '';
    public $start_date = '';
    public $variety = '';
    public $field = '';
    public $description = '';

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editVarietyFieldErrorBag' => 'editVarietyFieldErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->vfid = $params['id'];
			$varietyField = VarietyField::find($this->id);
            $this->start_date = $varietyField->start_date;
			$this->variety = $varietyField->variety_id;
            $this->field = $varietyField->field_id;
            $this->description = $varietyField->serial_number;
        }
	}

	public function emitEvent() {
		$this->emit('updateVarietyField', [
            'start_date' => $this->start_date,
            'variety' => $this->variety == '0' ? null : $this->variety,
            'field' => $this->field == '0' ? null : $this->field,
            'description' => $this->description,
		]);
	}

	public function editVarietyFieldErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.variety-field.edit-modal');
    }
}
