<?php

namespace App\View\Components\Ticket;

use App\Models\Status;
use App\Models\Country;
use App\Models\Category;
use Illuminate\View\Component;

class EditTicketModal extends Component
{
    public function render()
    {
        return view('components.ticket.edit-ticket-modal', [
            'categories' => Category::all(),
            'statuses' => Status::all(),
            'countries' => Country::all()
        ]);
    }
}
