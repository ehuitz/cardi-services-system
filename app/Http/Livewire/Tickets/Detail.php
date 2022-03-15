<?php

namespace App\Http\Livewire\Tickets;
use App\Models\Staff;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Country;
use App\Models\Category;
use App\Models\StaffTicket;
use App\Models\Department;
use Livewire\Component;

class Detail extends Component
{
    public Ticket $ticket;
    public $tID;
    public $staff;
    public $status;
    public $category;
    public $country;
    public $department;


    public function mount() {
        $this->status = $this->ticket->status_id;
        $this->category = $this->ticket->category_id;
        $this->country = $this->ticket->country_id;
        $this->department = $this->ticket->department_id;
        $this->allMessages = Message::where('ticket_id', $this->tID)->get()->toArray();
        $this->tID = $this->ticket->id;
        $this->staff = $this->ticket->staff;
    }

    public function updatedStatus($newValue) {
        $this->ticket->status_id = $newValue;
        $this->saveTicket('status');

    }

    public function updatedCategory($newValue) {
        $this->ticket->category_id = $newValue;
        $this->saveTicket('category');
    }

    public function updatedCountry($newValue) {
        $this->ticket->country_id = $newValue;
        $this->saveTicket('country');
    }

    public function updatedDepartment($newValue) {
        $this->ticket->department_id = $newValue;
        $this->saveTicket('department');
    }



    public function saveTicket($property, $newValue=null) {


        if (!$newValue) $newValue = $this->ticket->$property->name;
        try {
            $this->ticket->save();

            $this->emit('flashSuccess', ucwords($property) . '  to: ' . $newValue);

         } catch (\exception $e) {
             $this->emit('flashError', 'Error updating ' . $property . ' to: ' . $newValue);
         }


         try {
            $message = Message::create([
                'ticket_id' => $this->ticket->id,
                'author_id' => auth()->user()->id,
                'content' => ucwords($property) . ' updated to: ' . $newValue
            ])->toArray();
        }
        catch (\exception $e) {
            dd($e);
        }
    }


    public function render()
    {
            return view('livewire.tickets.detail');

    }
}
