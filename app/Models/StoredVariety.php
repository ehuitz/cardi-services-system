<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredVariety extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [

        'created_at' => 'date:M-d-y h:i a',
        'updated_at' => 'date:M-d-y h:i a'
    ];

    public function storage() {
        return $this->belongsTo(Storage::class);
    }

    public function variety() {
        return $this->belongsTo(Variety::class);
    }

    public function variety_field() {
        return $this->belongsTo(VarietyField::class);
    }

    public function scopeFilter($query, array $filters) {
        // $query->when($filters['search'] ?? false, fn($query, $search) =>
        //     $query->where(fn($query) =>
        //         $query->where('name', 'like', '%' . $search . '%')

        //     )
        // );

        $query->when($filters['sortField'] ?? false, fn($query, $sortField) =>
            $query->when($filters['sortAsc'] ?? false, fn($query, $sortAsc) =>
                $query->orderBy($sortField, 'DESC')
            )
        );

        $query->when($filters['variety'] ?? false, fn($query, $variety) =>
            $query->where('variety_id', $variety)
        );
    }
}
