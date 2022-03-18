<?php

namespace App\View\Components\Forms;

use App\Models\Country;
use App\Models\Category;
use Illuminate\View\Component;

class Ticket extends Component
{
    public function render()
    {
        if(auth()->user()->is_staff())


        return view('components.forms.ticket', [
            "categories" => Category::all(),
            "countries" => Country::where('type','External')->get()
        ]);

        else
        return view('components.forms.ticket', [
            "categories" => Category::all(),
            "countries" => Country::where('type','External')->get()
        ]);
    }
}
