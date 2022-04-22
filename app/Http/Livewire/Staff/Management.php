<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use App\Models\Staff;
use App\Models\Department;
use App\Models\DepartmentStaff;
use Livewire\Component;
use App\Models\CountryStaff;
use App\Models\CategoryStaff;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Management extends Component
{
    protected $listeners = [
        'createStaff' => 'create',
        'updateStaff' => 'update',
        'deleteStaff' => 'delete',
    ];

    public function create($payload) {
        try {
            // Validate the information and that the email
            // belongs to a user
            $validated = Validator::make($payload, [
                'email' => 'required|string|email|max:255|exists:users,email',
                'category' => 'nullable|array',
                'department'=> 'nullable|array',
                'country' => 'nullable|array'
            ], [
                'email.exists' => 'Email does not belong to a user',
            ])->validate();

            try {
                // Check if the user is already a staff
                // If not, then make them a staff
                $user = User::where('email', $payload['email'])->first();
                if (Staff::where('user_id', $user->id)->first())
                    return $this->dispatchBrowserEvent('errorMessage', ['message' => 'Staff already exists!']);;
                $staff = Staff::create([ 'user_id' => $user->id ]);
                $user->staff = true;
                $user->save();

                // Assign categories and countrys if selected
                if($payload['category']) $staff->categories()->attach($payload['category']);
                if($payload['country']) $staff->countries()->attach($payload['country']);
                if($payload['department']) $staff->departments()->attach($payload['department']);

                $this->emitTo('staff.create-modal', 'show');
                $this->emit('flashSuccess', 'Staff created');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to create staff');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('create_' . $key, $error[0]);
            }
            $this->emit('createStaffErrorBag', $this->getErrorBag());
        }
    }

    public function update($payload) {
        try {
            // Validate the information
            $validated = Validator::make($payload, [
                'id' => 'required|exists:staff',
                'category' => 'nullable|array',
                'country' => 'nullable|array',
                'department' => 'nullable|array'
            ])->validate();

            try {
                // Check if the staff doesn't exist
                if (!$staff = Staff::find($payload['id'])) {
                    return $this->dispatchBrowserEvent('errorMessage', ['message' => 'Staff does not exist']);
                }

                // Remove all categories and country from staff
                CategoryStaff::where('staff_id', $staff->id)->delete();
                CountryStaff::where('staff_id', $staff->id)->delete();
                DepartmentStaff::where('staff_id', $staff->id)->delete();


                // Attach the updated categories and countries
                $staff->categories()->attach($payload['category']);
                $staff->countries()->attach($payload['country']);
                $staff->departments()->attach($payload['department']);

                $this->emitTo('staff.edit-modal', 'show');
                $this->emit('flashSuccess', 'Staff updated');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to update staff');
            }
        } catch (ValidationException $e) {
            foreach($e->errors() as $key=>$error) {
                $this->addError('edit_' . $key, $error[0]);
            }
            $this->emit('editStaffErrorBag', $this->getErrorBag());
        }
    }

    public function delete($id) {
        try {
            // Validate information and that the staff ID exists
            Validator::make(
                ['id' => $id],
                ['id' => 'required|exists:staff']
            )->validate();

            try {
                // Find the staff and user model
                // Delete the staff and set Staff bool to false on user
                $staff = Staff::find($id);
                $user = User::find($staff->user_id);
                $staff->delete();
                $user->staff = false;
                $user->save();
                $this->emit('flashSuccess', 'Staff deleted');
            } catch (\exception $e) {
                $this->emit('flashError', 'Error trying to delete staff');
            }
        } catch (ValidationException $e) {
            $this->emit('flashError', $e->errors()['id'][0]);
        }
    }

    public function render()
    {
        abort_if(Gate::denies('management_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('livewire.staff.management', [
            'allStaff' => Staff::latest()
                ->with(['countries', 'categories', 'user', 'departments', 'roles'])
                ->paginate(10)
        ]);


    }
}
