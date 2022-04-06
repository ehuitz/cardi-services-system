<?php

namespace App\View\Components\Filters;

use App\Models\Origin;
use Illuminate\View\Component;

class OriginDropdown extends Component
{
    public function render()
    {


        return view('components.filters.origin-dropdown', [
            'origins' => Origin::all()


        ]);
    }
}
