<?php

namespace App\Http\Livewire\Vrequests;

use App\Models\Vrequest;
use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;


class Author extends Component
{

    use WithFileUploads;

    public $recentVrequests;
    public $author;
    public $vrequest;
    public $quotations;
    public $contracts;
    public $file;



    public function mount() {
        $this->staff = request()->vrequest->staff;
        $this->vrequest = Vrequest::where('id', request()->vrequest->id);
        $this->recentVrequests = Vrequest::where('staff_id', $this->staff->id)
                ->where('id', '!=', request()->vrequest->id)
                ->limit(3)
                ->get()
                ->toArray();
        // $this->quotations = File::where('vrequest_id', '=', request()->vrequest->id)->where('type', '=', 'quotation')->get()->toArray();
        // $this->contracts = File::where('vrequest_id', '=', request()->vrequest->id)->where('type', '=', 'contract')->get()->toArray();

        $this->vrequest = request()->vrequest;
    }


    public function render()
    {
        return view('livewire.vrequests.author');
    }
}
