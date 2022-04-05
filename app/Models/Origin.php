<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    use HasFactory;
    protected $guarded = [];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('location', 'like', '%' . $search . '%')

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
