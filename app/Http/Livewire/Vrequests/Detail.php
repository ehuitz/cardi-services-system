<?php

namespace App\Http\Livewire\Vrequests;
use App\Models\Staff;
use App\Models\Status;
use App\Models\Vrequest;
use App\Models\Vstatus;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use Livewire\Component;

class Detail extends Component
{
    public Vrequest $vrequest;
    public $vrID;
    public $notes;
    public $days;
    public $date;
    public $country;
    public $department;
    public $vstatus;
    public $comments;
    public $status;



    public function mount() {
        $this->days = $this->vrequest->days;
        $this->date = $this->vrequest->date_start;
        $this->vrID = $this->vrequest->id;
        $this->notes = $this->vrequest->notes;
    }

    public function approveUnit() {

            try {
                $vstatus = Vstatus::create([
                    'vrequest_id' => $this->vrequest->id,
                    'staff_id' => auth()->user()->id,
                    'status' => 'Approved',
                    'notes' => 'Department/Unit Head Approved',
                ])->toArray();
                $this->emit('flashSuccess', 'Department/Unit Head Approved!');
                $this->vstatus = '';
            } catch (\exception $e) {
                dd($e);
            }

    }

    public function declineUnit() {

        try {
            $vstatus = Vstatus::create([
                'vrequest_id' => $this->vrequest->id,
                'staff_id' => auth()->user()->id,
                'status' => 'Declined',
                'notes' => 'Department/Unit Head Declined',
            ])->toArray();
            $this->emit('flashError', 'Department/Unit Head Declined!');
            $this->vstatus = '';
        } catch (\exception $e) {
            dd($e);
        }

}

    public function render()
    {
            return view('livewire.vrequests.detail');

    }
}
