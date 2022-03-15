<?php

namespace App\View\Components\Filters;

use App\Models\Country;
use Illuminate\View\Component;

class CountryDropdown extends Component
{
    public function render()
    {
        return view('components.filters.country-dropdown', [
            'countries' => Country::all()
        ]);
    }
}
