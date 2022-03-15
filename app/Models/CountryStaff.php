<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CountryStaff extends Pivot
{
    public function staff() {
        return $this->belongsTo(Staff::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
