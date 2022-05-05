<?php

namespace App\View\Components\Filters;

use App\Models\Variety;
use Illuminate\View\Component;

class VarietyDropdown extends Component
{
    public function render()
    {
        return view('components.filters.variety-dropdown', [
            'varieties' => Variety::all()
        ]);
    }
}
