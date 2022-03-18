<?php

namespace App\View\Components\Forms;

use App\Models\Country;
use Illuminate\View\Component;

class CountryAllDropdown extends Component
{
    public $label, $identifier, $name;

    public function __construct($label, $identifier, $name) {
        $this->label = $label;
        $this->identifier = $identifier;
        $this->name = $name ?? $this->identifier;
    }

    public function render()
    {

        return view('components.forms.countryall-dropdown', [
            "countries" => Country::all(),
            "label" => $this->label,
            "id" => $this->identifier,
            "name" => $this->name ?? $this->identifier,
        ]);
    }
}
