<?php

namespace App\Http\Livewire\Tickets;

use App\Models\Ticket;
use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;


class Author extends Component
{

    use WithFileUploads;

    public $recentTickets;
    public $author;
    public $ticket;
    public $quotations;
    public $contracts;
    public $file;



    public function mount() {
        $this->author = request()->ticket->author;
        $this->ticket = Ticket::where('id', request()->ticket->id);
        $this->recentTickets = Ticket::where('author_id', $this->author->id)
                ->where('id', '!=', request()->ticket->id)
                ->limit(3)
                ->get()
                ->toArray();
        $this->quotations = File::where('ticket_id', '=', request()->ticket->id)->where('type', '=', 'quotation')->get()->toArray();
        $this->contracts = File::where('ticket_id', '=', request()->ticket->id)->where('type', '=', 'contract')->get()->toArray();

        $this->ticket = request()->ticket;
    }


    public function render()
    {
        return view('livewire.tickets.author');
    }
}
