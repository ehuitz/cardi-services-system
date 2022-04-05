<?php

namespace App\Http\Livewire\Origin;

use App\Models\Origin;
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
        'createOrigin' => 'create',
        'updateOrigin' => 'update',
        'deleteOrigin' => 'delete',
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
                'institution' => 'required|string',
                'country_id' => 'nullable|exists:countries,id',
                'location' => 'required|string',
                'intro_name' => 'required|string',
                'belizean_name' => 'required|string',
                'description' => 'required|string',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the Origin model
                $origin = Origin::create([
                                        'institution' => $payload['institution'],
                                        'country_id' => $payload['country_id'],
                                        'location' => $payload['location'],
                                        'intro_name' => $payload['intro_name'],
                                        'belizean_name' => $payload['belizean_name'],
                                        'description' => $payload['description']] );

                // Assign details that are not nulled
                if($payload['country_id']) $origin->country_id = $payload['country_id'];
                $origin->save();
                $this->emitTo('origin.create-modal', 'show');
                $this->emit('flashSuccess', 'Origin created');
            } catch (\exception $e) {
                dd($e->getMessage());
                $this->emit('flashError', 'Error trying to create origin');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createOriginErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information and make sure location doesn't exist
            $validated = Validator::make($payload, [
                'id' => 'required|string|exists:origins,id',
                'institution' => 'required|string',
                'location' => 'required|string',
                'intro_name' => 'required|string',
                'belizean_name' => 'required|string',
                'description' => 'required|string',
                'country_id' => 'exists:countries,id',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the origin model
                $origin = Origin::find($payload['id']);
                $origin->location = $payload['location'];
                $origin->intro_name = $payload['intro_name'];
                $origin->belizean_name = $payload['belizean_name'];

                $origin->description = $payload['description'];


                $origin->country_id = $payload['country_id'];
                $origin->save();

                $this->emitTo('origin.edit-modal', 'show');
                $this->emit('flashSuccess', 'Origin updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update origin');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editOriginErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:origins']
            )->validate();

            try {

                $origin = Origin::find($id);
                $origin->delete();
                $this->emit('flashSuccess', 'Origin delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete origin');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.origin.management', [
            'origins' => Origin::filter([
                'search' => $this->search,
                'sortField' => $this->sortField,
                'sortAsc' => $this->sortAsc,
                'country' => $this->country
            ])
                ->with(['country'])
                ->paginate(14)
                ->withQueryString()
        ]);
    }
}
