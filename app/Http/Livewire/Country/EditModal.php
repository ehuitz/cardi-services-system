<?php

namespace App\Http\Livewire\Country;

use Livewire\Component;
use App\Models\Country;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
	public $id_;
	public $name;
    public $code;

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editCountryErrorBag' => 'editCountryErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->id_ = $params['id'];
			$country = Country::find($this->id_);
			$this->name = $country->name;
            $this->code = $country->code;
		}
	}

	public function emitEvent() {
		$this->emit('updateCountry', [
			'id' => $this->id_,
			'name' => $this->name,
            'code' => $this->code
		]);
	}

	public function editCountryErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.country.edit-modal');
    }
}
