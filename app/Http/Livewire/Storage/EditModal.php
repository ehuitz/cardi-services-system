<?php

namespace App\Http\Livewire\Storage;

use Livewire\Component;
use App\Models\Storage;
use App\Http\Livewire\Modal;

class EditModal extends Modal
{
	public $id_;
	public $name;
    public $type;
    public $capacity_units;
    public $capacity;
    public $repository;
    public $deparment;





	protected $listeners = [
		'openEditModal' => 'show',
		'showToggled' => 'showToggled',
		'editStorageErrorBag' => 'editStorageErrorBag'
	];

	public function showToggled($params) {
		if ($params) {
			$this->id_ = $params['id'];
			$storage = Storage::find($this->id_);
			$this->name = $storage->name;
            $this->type = $storage->type;
            $this->capacity_units = $storage->capacity_units;
            $this->capacity = $storage->capacity;
            $this->repository = $storage->repository;
            $this->department = $storage->department;
		}
	}

	public function emitEvent() {
		$this->emit('updateStorage', [
			'id' => $this->id_,
			'name' => $this->name,
            'type' => $this->type,
            'capacity_units' => $this->capacity_units,
            'capacity' => $this->capacity,
            'repository' => $this->repository,
            'department' => $this->department

		]);
	}

	public function editStorageErrorBag($errorBag) {
		$this->setErrorBag($errorBag);
	}

    public function render()
    {
        return view('livewire.storage.edit-modal');
    }
}
