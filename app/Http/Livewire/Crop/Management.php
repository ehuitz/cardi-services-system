<?php

namespace App\Http\Livewire\Crop;

use Livewire\Component;
use App\Models\Crop;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Management extends Component
{
    use WithPagination;

    protected $listeners = [
        'createCrop' => 'create',
        'updateCrop' => 'update',
        'deleteCrop' => 'delete',
    ];

    public function create($payload) {
        try {
            // Validate the informaiton and make sure the
            // Crop doesn't already exist
            $validated = Validator::make($payload, [
                'name' => 'required|string|unique:crops,name',
                'scientific_name' => 'required|string|unique:crops,scientific_name',
                'use' => 'required|string',
                'type' => 'required|string',
            ])->validate();

            try {
                // Create the crop
                Crop::create($validated);
                $this->emitTo('crop.create-modal', 'show');
                $this->emit('flashSuccess', 'Crop created!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to create crop');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createCropErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Check if crop name was entered and doesn't already exists
            $validated = Validator::make($payload, [
                'id' => 'required',
                'name' => 'required|string|unique:crops,name,' . $payload['id'],
                'scientific_name' => 'required|string|unique:crops,scientific_name,' . $payload['id'],
                'use' => 'required|string',
                'type' => 'required|string',
            ])->validate();

            try{
                // Find the crop and update the name
                $crop = Crop::find($payload['id']);
                $crop->name = $payload['name'];
                $crop->scientific_name = $payload['scientific_name'];
                $crop->use = $payload['use'];
                $crop->type = $payload['type'];
                $crop->save();
                $this->emitTo('crop.edit-modal', 'show');
                $this->emit('flashSuccess', 'Crop updated!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update crop');
            }

        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editCropErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            // Make sure crop id exists
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:crops']
            )->validate();

            // Delete the Crop
            try {
                Crop::find($id)->delete();
                $this->emit('flashSuccess', 'Crop deleted!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete crop');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function paginationView() {
        return 'vendor/livewire/tailwind';
    }

    public function render() {
        return view('livewire.crop.management', [
            'crops' => Crop::first('updated_at')
                ->paginate(14)
        ]);
    }
}
