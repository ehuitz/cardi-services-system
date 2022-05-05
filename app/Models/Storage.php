<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('number', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['sortField'] ?? false, fn($query, $sortField) =>
        $query->when($filters['sortAsc'] ?? false, fn($query, $sortAsc) =>
            $query->orderBy($sortField, 'DESC')
        )
    );

    $query->when($filters['department'] ?? false, fn($query, $department) =>
        $query->where('department_id', $department)
    );
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }


}
