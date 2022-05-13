<?php

namespace App\Http\Livewire\Storage;

use Livewire\Component;
use App\Models\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Management extends Component
{
    use WithPagination;

    public $sortField;
    public $sortAsc;
    public $search;
    public $department;

    protected $listeners = [
        'createStorage' => 'create',
        'updateStorage' => 'update',
        'deleteStorage' => 'delete',
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sortBy($field) {
        if ($this->sortField == $field)
            $this->sortAsc = !$this->sortAsc;
        else
            $this->sortAsc = true;

        $this->sortField = $field;
    }

    public function create($payload) {
        try {
            // Validate the informaiton and make sure the
            // Storage doesn't already exist
            $validated = Validator::make($payload, [
                'number' => 'required|string|unique:storages,number',
                'type' => 'required|string',
                'capacity_units' => 'required|string',
                'capacity' => 'required|numeric',
                'repository' => 'required|string',
                'department_id' => 'nullable|exists:departments,id',

            ])->validate();

            try {
                // Create the storage
                Storage::create($validated);
                $this->emitTo('storage.create-modal', 'show');
                $this->emit('flashSuccess', 'Storage created!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to create storage');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createStorageErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Check if storage number was entered and doesn't already exists
            $validated = Validator::make($payload, [
                'id' => 'required',
                'number' => 'required|string|unique:storages,number,' . $payload['id'],
                'type' => 'nullable|string',
                'capacity_units' => 'nullable|string',
                'capacity' => 'nullable|numeric',
                'repository' => 'nullable|string',
                'department_id' => 'exists:departments,id',


            ])->validate();

            try{
                // Find the storage and update the number
                $storage = Storage::find($payload['id']);
                $storage->number = $payload['number'];
                $storage->type = $payload['type'];
                $storage->capacity_units = $payload['capacity_units'];
                $storage->capacity = $payload['capacity'];
                $storage->repository = $payload['repository'];

                if ($payload['department']) $storage->department_id = $payload['department'];

                $storage->save();
                $this->emitTo('storage.edit-modal', 'show');
                $this->emit('flashSuccess', 'Storage updated!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update storage');
            }

        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editStorageErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            // Make sure storage id exists
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:storages']
            )->validate();

            // Delete the Storage
            try {
                Storage::find($id)->delete();
                $this->emit('flashSuccess', 'Storage deleted!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete storage');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function paginationView() {
        return 'vendor/livewire/tailwind';
    }

    public function render() {
        return view('livewire.storage.management', [
            'storages' => Storage::filter([
                'search' => $this->search,
                'sortField' => $this->sortField,
                'sortAsc' => $this->sortAsc,
                'department' => $this->department
            ])
                ->with(['department'])
                ->paginate(14)
                ->withQueryString()
        ]);
    }
}
