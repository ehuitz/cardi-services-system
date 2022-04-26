<?php

namespace App\Http\Livewire\Type;

use Livewire\Component;
use App\Models\Type;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Management extends Component
{
    use WithPagination;

    protected $listeners = [
        'createType' => 'create',
        'updateType' => 'update',
        'deleteType' => 'delete',
    ];

    public function create($payload) {
        try {
            // Validate the informaiton and make sure the
            // Type doesn't already exist
            $validated = Validator::make($payload, [
                'name' => 'required|string|unique:types,name',
                'code' => 'required|string|unique:types,code'
            ])->validate();

            try {
                // Create the type
                Type::create($validated);
                $this->emitTo('type.create-modal', 'show');
                $this->emit('flashSuccess', 'Type created!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to create type');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createTypeErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Check if type name was entered and doesn't already exists
            $validated = Validator::make($payload, [
                'id' => 'required',
                'name' => 'required|string|unique:types,name,' . $payload['id'],
                'code' => 'required|string|unique:types,code,' . $payload['id'],
            ])->validate();

            try{
                // Find the type and update the name
                $type = Type::find($payload['id']);
                $type->name = $payload['name'];
                $type->code = $payload['code'];
                $type->save();
                $this->emitTo('type.edit-modal', 'show');
                $this->emit('flashSuccess', 'Type updated!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update type');
            }

        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editTypeErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            // Make sure type id exists
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:types']
            )->validate();

            // Delete the Type
            try {
                Type::find($id)->delete();
                $this->emit('flashSuccess', 'Type deleted!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete type');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function paginationView() {
        return 'vendor/livewire/tailwind';
    }

    public function render() {
        return view('livewire.type.management', [
            'types' => Type::first('updated_at')
                ->paginate(14)
        ]);
    }
}
