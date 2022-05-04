<?php

namespace App\Http\Livewire\Variety;
use App\Models\Origin;
use App\Models\Status;
use App\Models\Variety;
use Livewire\Component;

class Detail extends Component
{
    public Variety $variety;
    public $vID;
    public $name;
    public $origin;
    public $crop;

    public $type;
    public $description;
    public $use;


    public function mount() {
        $this->vID = $this->variety->id;
        $this->name = $this->variety->name;
        $this->origin = $this->variety->origin;
        $this->crop = $this->variety->crop;
        $this->type = $this->variety->type;
        $this->description = $this->variety->description;
        $this->use = $this->variety->use;

    }



    public function render()
    {
            return view('livewire.variety.detail');

    }
}
