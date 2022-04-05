<?php

namespace App\Http\Livewire\Field;

use App\Models\Field;
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
    public $country;

    protected $queryString = ['search', 'sortField', 'sortAsc','country'];

    protected $listeners = [
        'createField' => 'create',
        'updateField' => 'update',
        'deleteField' => 'delete',
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
                'name' => 'required|string',
                'block_id' => 'nullable|exists:blocks,id',
                'area' => 'required|integer',
                'description' => 'required|string',
            ], [
                'block.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the Field model
                $field = Field::create(['name' => $payload['name'],
                                        'block_id' => $payload['block_id'],
                                        'area' => $payload['area'],
                                        'description' => $payload['description']] );

                // Assign details that are not nulled
                if($payload['block_id']) $field->block_id = $payload['block_id'];
                $field->save();
                $this->emitTo('field.create-modal', 'show');
                $this->emit('flashSuccess', 'Field created');
            } catch (\exception $e) {
                dd($e->getMessage());
                $this->emit('flashError', 'Error trying to create field');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createFieldErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information and make sure name doesn't exist
            $validated = Validator::make($payload, [
                'id' => 'required|string|exists:fields,id',
                'area' => 'required|integer',
                'description' => 'required|string',
                'name' => [
                    'required',
                    'string',
                ],
                'block_id' => 'exists:blocks,id',
            ], [
                'block.exists' => 'Block does not exist',
            ])->validate();

            try {
                // Create the field model
                $field = Field::find($payload['id']);
                $field->name = $payload['name'];
                $field->area = $payload['area'];

                $field->description = $payload['description'];


                $field->block_id = $payload['block_id'];
                $field->save();

                $this->emitTo('field.edit-modal', 'show');
                $this->emit('flashSuccess', 'Field updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update Field');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editFieldErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:fields']
            )->validate();

            try {
                Field::find($id)->delete();
                $this->emit('flashSuccess', 'Field delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete block');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.field.management', [
            'fields' => Field::filter([
                'search' => $this->search,
                'sortField' => $this->sortField,
                'sortAsc' => $this->sortAsc,
                'country' => $this->country
            ])
                ->with(['block'])
                ->paginate(14)
                ->withQueryString()
        ]);
    }
}
