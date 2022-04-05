<?php

namespace App\Http\Livewire\Origin;

use App\Models\Origin;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $institution = '';
    public $country = '';
    public $location = '';
    public $intro_name = '';
    public $belizean_name = '';
    public $description = '';



	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editOriginErrorBag' => 'editOriginErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$origin = Origin::find($this->oid);
            $this->institution = $origin->institution;
			$this->country = $origin->country_id;
			$this->location = $origin->location;
            $this->intro_name = $origin->intro_name;
            $this->belizean_name = $origin->belizean_name;
            $this->description = $origin->description;

        }
	}

	public function emitEvent() {
		$this->emit('updateOrigin', [
			'id' => $this->oid,
            'institution' => $this->institution,
            'country_id' => $this->country == '0' ? null : $this->country,
            'location' => $this->location,
            'intro_name' => $this->intro_name,
            'belizean_name' => $this->belizean_name,
            'description' => $this->description,
		]);
	}

	public function editOriginErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.origin.edit-modal');
    }
}
