<?php

namespace App\Http\Livewire\StoredVariety;

use App\Models\StoredVariety;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Management extends Component
{
    use WithPagination;

    public $sortField;
    public $sortAsc;
    public $search;
    public $start_date;
    public $variety;
    public $storage;
    public $variety_field;



    protected $queryString = ['search', 'sortField', 'sortAsc', 'variety', 'storage', 'variety_field'];

    protected $listeners = [
        'createStoredVariety' => 'create',
        'updateStoredVariety' => 'update',
        'deleteStoredVariety' => 'delete',
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
            // Validate information and make sure name doesn't exist
            $validated = Validator::make($payload, [
                'storage_id' => 'required|exists:storages,id',
                'variety_field_id' => 'nullable|exists:variety_fields,id',
                'variety_id' => 'nullable|exists:varieties,id',
                'quantity' => 'required|numeric',
                'date' => 'required|date',
                'description' => 'nullable|string'

            ], [
                'storage.exists' => 'Storage Repository does not exist',
                'variety.exists' => 'Variety does not exist',
                'variety_field.exists' => 'Variety Field does not exist',
            ])->validate();

            try {
                // Create the storedVarieties model
                $storedVarieties = StoredVariety::create([
                    'storage_id' => $payload['storage_id'],
                    'quantity' => $payload['quantity'],
                    'date' => $payload['date'],

                ]);

                // Assign details that are not nulled
                if($payload['variety_id']) $storedVarieties->variety_id = $payload['variety_id'];
                if($payload['variety_field_id']) $storedVarieties->variety_field_id = $payload['variety_field_id'];
                if($payload['description']) $storedVarieties->description = $payload['description'];

                $storedVarieties->save();

                $this->emitTo('stored-variety.create-modal', 'show');
                $this->emit('flashSuccess', 'Variety has been Stored created');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to stored Varieties in repository');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createStoredVarietyErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information doesn't exist
            Validator::make($payload, [
                'id' => 'required|integer|exists:stored_varieties,id',
                'storage_id' => 'required|integer|exists:storages,id',
                'stored_varieties_id' => 'nullable|integer|exists:stored_varieties,id',
                'variety_id' => 'nullable|integer|exists:varieties,id',
                'quantity' => 'required|numeric',
                'date' => 'required|date',
                'description' => 'nullable|string'
            ])->validate();

            try {
                // Create the storedVarieties model
                $storedVarieties = StoredVariety::find($payload['id']);
                $storedVarieties->storage_id = $payload['storage_id'];
                $storedVarieties->quantity = $payload['quantity'];
                $storedVarieties->date = $payload['date'];

                if($payload['variety_field_id']) $storedVarieties->variety_field_id = $payload['variety_field_id'];
                if($payload['variety_id']) $storedVarieties->variety_id = $payload['variety_id'];
                if($payload['description']) $storedVarieties->description = $payload['description'];

                $storedVarieties->save();

                $this->emitTo('variety-field.edit-modal', 'show');
                $this->emit('flashSuccess', 'Variety Field updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update  Variety Field');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editStoredVarietyErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:stored_varieties,id']
            )->validate();

            try {
                StoredVariety::find($id)->delete();
                $this->emit('flashSuccess', 'Stored Variety deleted');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete Stored Variety');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.stored-variety.management', [
            'storedVarieties' => StoredVariety::filter([
                'search' => $this->search,
                'variety' => $this->variety,
                'variety_field' => $this->variety_field,
            ])
                ->with(['storage', 'variety_field','variety'])
                ->paginate(10)
                ->withQueryString()
        ]);
    }
}
