<?php

namespace App\View\Components\Forms;

use App\Models\Country;
use App\Models\Category;
use Illuminate\View\Component;

class Ticket extends Component
{
    public function render()
    {
        return view('components.forms.ticket', [
            "categories" => Category::all(),
            "countries" => Country::all()
        ]);
    }
}
