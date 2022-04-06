<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')

            )
        );

        $query->when($filters['sortField'] ?? false, fn($query, $sortField) =>
            $query->when($filters['sortAsc'] ?? false, fn($query, $sortAsc) =>
                $query->orderBy($sortField, 'DESC')
            )
        );
    }
}
