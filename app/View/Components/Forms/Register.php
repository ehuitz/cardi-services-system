<?php

namespace App\View\Components\Forms;

use App\Models\Country;
use App\Models\Category;
use Illuminate\View\Component;

class Register extends Component
{
    public function render()
    {
        return view('components.breeze.register', [
            "countries" => Country::where('type','External')->get()
        ]);
    }
}
