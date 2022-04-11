<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vrequest extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded = [];


    public function staff() {
       return $this->belongsTo(Staff::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('days', 'like', '%' . $search . '%')
            )
        );
    }
}
