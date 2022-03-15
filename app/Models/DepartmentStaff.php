<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DepartmentStaff extends Pivot
{
    public function staff() {
        return $this->belongsTo(Staff::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
