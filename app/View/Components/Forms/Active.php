<?php

namespace App\View\Components\Forms;

use App\Models\Activity;
use Illuminate\View\Component;

class Active extends Component
{
    public function render()
    {
        return view('components.breeze.activity', [
            "activities" => Activity::all(),
        ]);
    }
}
