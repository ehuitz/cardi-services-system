<?php

namespace App\Http\Livewire\Vrequests;
use App\Models\Staff;
use App\Models\Status;
use App\Models\Vrequest;
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


    public function mount() {
        $this->days = $this->vrequest->days;
        $this->date = $this->vrequest->date_start;
        $this->vrID = $this->vrequest->id;
        $this->notes = $this->vrequest->notes;
    }

    public function updatedStatus($newValue) {
        $this->vrequest->status = $newValue;
        $this->saveVrequest('status');

    }



    public function saveVrequest($property, $newValue=null) {


        if (!$newValue) $newValue = $this->vrequest->$property->name;
        try {
            $this->vrequest->save();

            $this->emit('flashSuccess', ucwords($property) . '  to: ' . $newValue);

         } catch (\exception $e) {
             $this->emit('flashError', 'Error updating ' . $property . ' to: ' . $newValue);
         }
    }


    public function render()
    {
            return view('livewire.vrequests.detail');

    }
}
