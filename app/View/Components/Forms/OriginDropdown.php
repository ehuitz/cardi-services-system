<?php

namespace App\View\Components\Forms;

use App\Models\Origin;
use Illuminate\View\Component;

class OriginDropdown extends Component
{
    public $label, $identifier, $name;

    public function __construct($label, $identifier, $name) {
        $this->label = $label;
        $this->identifier = $identifier;
        $this->name = $name ?? $this->identifier;
    }

    public function render()
    {
        return view('components.forms.origin-dropdown', [
            "origins" => Origin::all(),
            "label" => $this->label,
            "id" => $this->identifier,
            "name" => $this->name ?? $this->identifier,
        ]);
    }
}
