<?php

namespace App\View\Components\Filters;

use App\Models\Department;
use Illuminate\View\Component;

class DepartmentDropdown extends Component
{
    public function render()
    {
        return view('components.filters.department-dropdown', [
            'departments' => Department::all()
        ]);
    }
}
