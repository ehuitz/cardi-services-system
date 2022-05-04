<?php

namespace App\Http\Livewire\Variety;

use App\Models\Variety;
use App\Models\Image;
use App\Models\Origin;
use Livewire\Component;
use Livewire\WithFileUploads;


class Author extends Component
{

    use WithFileUploads;

    public $variety;

    public $images;



    public function mount() {
        $this->variety = Variety::where('id', request()->variety->id);

        $this->images = Image::where('variety_id', '=', request()->variety->id)->where('type', '=', 'image')->get()->toArray();


        $this->variety = request()->variety;
    }


    public function render()
    {
        return view('livewire.variety.author');
    }
}
