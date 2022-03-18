<?php

namespace App\Http\Livewire\Country;

use Livewire\Component;
use App\Models\Country;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Management extends Component
{
    use WithPagination;

    protected $listeners = [
        'createCountry' => 'create',
        'updateCountry' => 'update',
        'deleteCountry' => 'delete',
    ];

    public function create($payload) {
        try {
            // Validate the informaiton and make sure the
            // Country doesn't already exist
            $validated = Validator::make($payload, [
                'name' => 'required|string|unique:countries,name',
                'code' => 'required|string|unique:countries,code'
            ])->validate();

            try {
                // Create the country
                Country::create($validated);
                $this->emitTo('country.create-modal', 'show');
                $this->emit('flashSuccess', 'Country created!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to create country');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createCountryErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Check if country name was entered and doesn't already exists
            $validated = Validator::make($payload, [
                'id' => 'required',
                'name' => 'required|string|unique:countries,name,' . $payload['id'],
                'code' => 'required|string|unique:countries,code,' . $payload['id'],
            ])->validate();

            try{
                // Find the country and update the name
                $country = Country::find($payload['id']);
                $country->name = $payload['name'];
                $country->code = $payload['code'];
                $country->save();
                $this->emitTo('country.edit-modal', 'show');
                $this->emit('flashSuccess', 'Country updated!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update country');
            }

        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editCountryErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            // Make sure country id exists
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:countries']
            )->validate();

            // Delete the Country
            try {
                Country::find($id)->delete();
                $this->emit('flashSuccess', 'Country deleted!');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete country');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function paginationView() {
        return 'vendor/livewire/tailwind';
    }

    public function render() {
        return view('livewire.country.management', [
            'countries' => Country::first('updated_at')
                ->paginate(14)
        ]);
    }
}
