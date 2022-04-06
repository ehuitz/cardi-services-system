<?php

namespace App\Http\Livewire\Variety;

use App\Models\Variety;
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
    public $origin;

    protected $queryString = ['search', 'sortField', 'sortAsc','origin'];

    protected $listeners = [
        'createVariety' => 'create',
        'updateVariety' => 'update',
        'deleteVariety' => 'delete',
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sortBy($variety) {
        if ($this->sortField == $variety)
            $this->sortAsc = !$this->sortAsc;
        else
            $this->sortAsc = true;

        $this->sortField = $variety;
    }

    public function create($payload) {
        try {
            // Validate information and make sure name doesn't exist
            $validated = Validator::make($payload, [
                'name' => 'required|string',
                'origin_id' => 'nullable|exists:origins,id',
                'type' => 'required|string',
                'description' => 'required|string',
                'use' => 'required|string',
            ], [
                'origin.exists' => 'Origin does not exist',
            ])->validate();

            try {
                // Create the Variety model
                $variety = Variety::create(['name' => $payload['name'],
                                        'origin_id' => $payload['origin_id'],
                                        'type' => $payload['type'],
                                        'description' => $payload['description'],
                                        'use' => $payload['use']
                                        ] );


                // Assign details that are not nulled
                if($payload['origin_id']) $variety->origin_id = $payload['origin_id'];
                $variety->save();
                $this->emitTo('variety.create-modal', 'show');
                $this->emit('flashSuccess', 'Variety created');
            } catch (\exception $e) {
                dd($e->getMessage());
                $this->emit('flashError', 'Error trying to create variety');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createVarietyErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information and make sure name doesn't exist
            $validated = Validator::make($payload, [
                'id' => 'required|string|exists:varieties,id',
                'type' => 'required|integer',
                'description' => 'required|string',
                'use' => 'required|string',
                'name' => [
                    'required',
                    'string',
                ],
                'origin_id' => 'exists:origins,id',
            ], [
                'origin.exists' => 'Origin does not exist',
            ])->validate();

            try {
                // Create the variety model
                $variety = Variety::find($payload['id']);
                $variety->name = $payload['name'];
                $variety->type = $payload['type'];
                $variety->use = $payload['use'];

                $variety->description = $payload['description'];


                $variety->origin_id = $payload['origin_id'];
                $variety->save();

                $this->emitTo('variety.edit-modal', 'show');
                $this->emit('flashSuccess', 'Variety updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update Variety');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editVarietyErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:varieties']
            )->validate();

            try {
                Variety::find($id)->delete();
                $this->emit('flashSuccess', 'Variety delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete origin');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.variety.management', [
            'varieties' => Variety::filter([
                'search' => $this->search,
                'sortField' => $this->sortField,
                'sortAsc' => $this->sortAsc,
                'origin' => $this->origin
            ])
                ->with(['origin'])
                ->paginate(14)
                ->withQueryString()
        ]);
    }
}