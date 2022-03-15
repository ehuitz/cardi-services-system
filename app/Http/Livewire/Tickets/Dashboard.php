<?php

namespace App\Http\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $search;
    public $category;
    public $status;
    public $staff;
    public $country;
    public $department;

    protected $queryString = ['search', 'category', 'status', 'staff', 'country', 'department'];

    public function updating() {
        $this->resetPage();
    }

    public function render()
    {
        if(auth()->user()->is_staff())
            return view('livewire.tickets.dashboard', [
                'tickets' => Ticket::latest('updated_at')
                    ->filter([
                        'search' => $this->search,
                        'category' => $this->category,
                        'status' => $this->status,
                        'staff' => $this->staff,
                        'country' => $this->country,
                        'department' => $this->department
                    ])
                    ->with('category', 'country', 'status', 'author', 'staff', 'department')
                    ->paginate(10)
                    ->withQueryString()
            ]);
        else
            return view('livewire.tickets.dashboard', [
                'tickets' => Ticket::latest('updated_at')
                    ->filter([
                        'search' => $this->search,
                        'status' => $this->status
                    ])
                    ->where('author_id', auth()->user()->id)
                    ->with('category', 'country', 'status', 'author', 'staff', 'department')
                    ->paginate(10)
                    ->withQueryString()
            ]);

    }
}
