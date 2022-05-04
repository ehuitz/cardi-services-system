<?php

namespace App\View\Components\Filters;

use App\Models\Crop;
use Illuminate\View\Component;

class CropDropdown extends Component
{
    public function render()
    {


        return view('components.filters.crop-dropdown', [
            'crops' => Crop::all()


        ]);
    }
}
