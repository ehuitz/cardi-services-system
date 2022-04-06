<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
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
        'createProject' => 'create',
        'updateProject' => 'update',
        'deleteProject' => 'delete',
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
                'code' => 'nullable|string|unique:projects,code',
                'type' => 'required|string',
                'description' => 'required|string',

                'country_id' => 'nullable|exists:countries,id',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the project model
                $project = Project::create(['name' => $payload['name'],
                                            'code' => $payload['code'],
                                            'country_id' => $payload['country_id'],
                                            'type' => $payload['type'],
                                            'description' => $payload['description'],





                                            ] );

                // Assign details that are not nulled
                if($payload['country_id']) $project->country_id = $payload['country_id'];
                $project->save();
                $this->emitTo('project.create-modal', 'show');
                $this->emit('flashSuccess', 'Project created');
            } catch (\exception $e) {
                dd($e->getMessage());
                $this->emit('flashError', 'Error trying to create project');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createProjectErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate information and make sure name doesn't exist
            $validated = Validator::make($payload, [
                'id' => 'required|string|exists:projects,id',
                'name' => [
                    'required',
                    'string',
                ],
                'code' => 'nullable|string|unique:projects,code',
                'type' => 'nullable|string',
                'description' => 'nullable|string',


                'country_id' => 'exists:countries,id',
            ], [
                'country.exists' => 'Country does not exist',
            ])->validate();

            try {
                // Create the project model
                $project = Project::find($payload['id']);
                $project->name = $payload['name'];
                $project->code = $payload['code'];
                $project->type = $payload['name'];
                $project->description = $payload['description'];
                $project->country_id = $payload['country_id'];
                $project->save();

                $this->emitTo('project.edit-modal', 'show');
                $this->emit('flashSuccess', 'Project updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update project');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editProjectErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:projects,name']
            )->validate();

            try {
                Project::find($id)->delete();
                $this->emit('flashSuccess', 'Project delete');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete project');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        return view('livewire.project.management', [
            'projects' => Project::filter([
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
