<?php

namespace App\View\Components\Forms;

use App\Models\Crop;
use Illuminate\View\Component;

class CropDropdown extends Component
{
    public $label, $identifier, $name;

    public function __construct($label, $identifier, $name) {
        $this->label = $label;
        $this->identifier = $identifier;
        $this->name = $name ?? $this->identifier;
    }

    public function render()
    {
        return view('components.forms.crop-dropdown', [
            "crops" => Crop::all(),
            "label" => $this->label,
            "id" => $this->identifier,
            "name" => $this->name ?? $this->identifier,
        ]);
    }
}
