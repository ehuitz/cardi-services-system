<?php

namespace App\View\Components\Filters;

use App\Models\Block;
use Illuminate\View\Component;

class BlockDropdown extends Component
{
    public function render()
    {


        return view('components.filters.block-dropdown', [
            'blocks' => Block::all()

            
        ]);
    }
}
