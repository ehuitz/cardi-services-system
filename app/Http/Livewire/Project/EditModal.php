<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
    public $oid = '';
    public $name = '';
    public $code = '';
    public $country = '';
    public $type = '';
    public $description = '';

	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editProjectErrorBag' => 'editProjectErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->oid = $params['id'];
			$project = Project::find($this->oid);
			$this->name = $project->name;
			$this->code = $project->code;
			$this->country = $project->country_id;
            $this->type = $project->type;
            $this->description = $project->description;
        }
	}

	public function emitEvent() {
		$this->emit('updateProject', [
			'id' => $this->oid,
			'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'description' => $this->description,

            'country_id' => $this->country == '0' ? null : $this->country,
		]);
	}

	public function editProjectErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.project.edit-modal');
    }
}
