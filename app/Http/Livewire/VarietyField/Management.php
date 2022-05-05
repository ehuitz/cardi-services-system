<?php

namespace App\Http\Livewire\VarietyField;

use App\Models\VarietyField;
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
    public $field;
    public $description;



    protected $queryString = ['search', 'sortField', 'sortAsc', 'variety'];

    protected $listeners = [
        'createVarietyField' => 'create',
        'updateVarietyField' => 'update',
        'deleteVarietyField' => 'delete',
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
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'variety_id' => 'required|exists:varieties,id',
                'field_id' => 'required|exists:fields,id',
                'description' => 'nullable|string',
            ], [
                'department.exists' => 'Department does not exist',
                'field.exists' => 'Field does not exist',
            ])->validate();

            try {
                // Create the varietyField model
                $varietyField = VarietyField::create([
                    'variety_id' => $payload['variety_id'],
                    'field_id' => $payload['field_id'],
                    'start_date' => $payload['start_date'],
                    'end_date' => $payload['end_date'],

                ]);

                // Assign details that are not nulled
                if($payload['description']) $varietyField->description = $payload['description'];

                $varietyField->save();

                $this->emitTo('variety-field.create-modal', 'show');
                $this->emit('flashSuccess', 'Variety Field created');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to create varietyField');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createVarietyFieldErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information doesn't exist
            Validator::make($payload, [
                'id' => 'required|integer|exists:variety_fields,id',
                'variety_id' => 'required|integer|exists:varieties,id',
                'field_id' => 'required|integer|exists:fields,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'description' => 'nullable|string'
            ])->validate();

            try {
                // Create the varietyField model
                $varietyField = VarietyField::find($payload['id']);
                $varietyField->variety_id = $payload['variety_id'];
                $varietyField->field_id = $payload['field_id'];
                $varietyField->start_date = $payload['start_date'];
                $varietyField->end_date = $payload['end_date'];

                if($payload['description']) $varietyField->description = $payload['description'];

                $varietyField->save();

                $this->emitTo('variety-field.edit-modal', 'show');
                $this->emit('flashSuccess', 'Variety Field updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update  Variety Field');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editVarietyFieldErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:variety_fields,id']
            )->validate();

            try {
                VarietyField::find($id)->delete();
                $this->emit('flashSuccess', 'VarietyField delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete Variety Field');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.variety-field.management', [
            'varietyFields' => VarietyField::filter([
                'search' => $this->search,
                'variety' => $this->variety,
                'field' => $this->field,
            ])
                ->with(['variety', 'field'])
                ->paginate(10)
                ->withQueryString()
        ]);
    }
}
