<?php

namespace App\Http\Livewire\Variety;

use App\Models\Variety;
use App\Models\Origin;
use Livewire\Component;
use Livewire\WithFileUploads;


class Author extends Component
{

    use WithFileUploads;

    public $variety;
    public $quotations;
    public $contracts;
    public $file;



    public function mount() {
        $this->variety = Variety::where('id', request()->variety->id);

        // $this->quotations = File::where('variety_id', '=', request()->variety->id)->where('type', '=', 'quotation')->get()->toArray();
        // $this->contracts = File::where('variety_id', '=', request()->variety->id)->where('type', '=', 'contract')->get()->toArray();

        $this->variety = request()->variety;
    }


    public function render()
    {
        return view('livewire.variety.author');
    }
}
