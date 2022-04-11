<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccrued extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded = [];


    public function staff() {
        $this->belongsTo(Staff::class);
    }

}
