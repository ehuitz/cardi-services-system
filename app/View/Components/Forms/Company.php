<?php

namespace App\View\Components\Forms;

use App\Models\Type;
use App\Models\Category;
use Illuminate\View\Component;

class Company extends Component
{
    public function render()
    {
        return view('components.breeze.company', [
            "types" => Type::all(),
        ]);
    }
}
