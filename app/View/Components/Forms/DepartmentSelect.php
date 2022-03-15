<?php

namespace App\View\Components\Forms;

use App\Models\Department;
use Illuminate\View\Component;

class DepartmentSelect extends Component
{
    public $label, $identifier, $name, $val;

    public function __construct($label, $identifier, $name, $val) {
        $this->label = $label;
        $this->identifier = $identifier;
        $this->name = $name;
        $this->val = $val;
    }

    public function render()
    {
        return view('components.forms.department-select', [
            "departments" => Department::all(),
            "label" => $this->label,
            "id" => $this->identifier,
            "name" => $this->name,
            "val" => $this->val ?? ''
        ]);
    }
}
