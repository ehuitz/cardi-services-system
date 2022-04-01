<?php

namespace App\Http\Livewire\Block;

use App\Models\Block;
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
        'createBlock' => 'create',
        'updateBlock' => 'update',
        'deleteBlock' => 'delete',
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
                'location' => 'required|string',
                'country_id' => 'nullable|exists:countries,id',
                'area' => 'required|integer',
                'description' => 'required|string',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the Block model
                $block = Block::create(['location' => $payload['location'],
                                        'country_id' => $payload['country_id'],
                                        'area' => $payload['area'],
                                        'description' => $payload['description']] );

                // Assign details that are not nulled
                if($payload['country_id']) $block->country_id = $payload['country_id'];
                $block->save();
                $this->emitTo('block.create-modal', 'show');
                $this->emit('flashSuccess', 'Block created');
            } catch (\exception $e) {
                dd($e->getMessage());
                $this->emit('flashError', 'Error trying to create block');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createBlockErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information and make sure location doesn't exist
            $validated = Validator::make($payload, [
                'id' => 'required|string|exists:blocks,id',
                'name' => [
                    'required',
                    'string',
                ],
                'country_id' => 'exists:countries,id',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the block model
                $block = Block::find($payload['id']);
                $block->name = $payload['name'];

                $block->country_id = $payload['country_id'];
                $block->save();

                $this->emitTo('block.edit-modal', 'show');
                $this->emit('flashSuccess', 'Block updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update block');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editBlockErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:blocks,name']
            )->validate();

            try {
                Block::find($id)->delete();
                $this->emit('flashSuccess', 'Block delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete block');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.block.management', [
            'blocks' => Block::filter([
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
