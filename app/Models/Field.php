<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded = [];

    public function block() {
        return $this->belongsTo(Block::class);
    }

    public function country() {
        return $this->belongsTo(Country::class)->using(Block::class);
    }


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

        $query->when($filters['country'] ?? false, fn($query, $country) =>
            $query->where('country_id', $country)
        );
    }
}
