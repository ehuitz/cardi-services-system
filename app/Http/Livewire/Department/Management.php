<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
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
    // public $model;
    public $country;

    // protected $queryString = ['search', 'sortField', 'sortAsc', 'model', 'country'];
    protected $queryString = ['search', 'sortField', 'sortAsc','country'];

    protected $listeners = [
        'createDepartment' => 'create',
        'updateDepartment' => 'update',
        'deleteDepartment' => 'delete',
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
                'country_id' => 'nullable|exists:countries,id',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the department model
                $department = Department::create(['name' => $payload['name'], 'country_id' => $payload['country_id']] );

                // Assign details that are not nulled
                if($payload['country_id']) $department->country_id = $payload['country_id'];
                $department->save();
                $this->emitTo('department.create-modal', 'show');
                $this->emit('flashSuccess', 'Department created');
            } catch (\exception $e) {
                dd($e->getMessage());
                $this->emit('flashError', 'Error trying to create department');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createDepartmentErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information and make sure name doesn't exist
            $validated = Validator::make($payload, [
                'id' => 'required|string|exists:departments,id',
                'name' => [
                    'required',
                    'string',
                ],
                'country_id' => 'exists:countries,id',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the department model
                $department = Department::find($payload['id']);
                $department->name = $payload['name'];

                $department->country_id = $payload['country_id'];
                $department->save();

                $this->emitTo('department.edit-modal', 'show');
                $this->emit('flashSuccess', 'Department updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update department');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editDepartmentErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:departments,name']
            )->validate();

            try {
                Department::find($id)->delete();
                $this->emit('flashSuccess', 'Department delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete department');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.department.management', [
            'departments' => Department::filter([
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
