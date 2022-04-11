<?php

namespace App\Http\Livewire\Vrequests;

use App\Models\Vrequest;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $sortField;
    public $sortAsc;
    public $search;

    protected $queryString = ['search', 'sortField', 'sortAsc'];

    public function updating() {
        $this->resetPage();
    }

    public function render()
    {
            return view('livewire.vrequests.dashboard', [
                'vrequests' => Vrequest::filter([
                    'search' => $this->search,
                    'sortField' => $this->sortField,
                    'sortAsc' => $this->sortAsc,
                ])
                    ->with('staff')
                    ->paginate(10)
                    ->withQueryString()
            ]);


    }
}
