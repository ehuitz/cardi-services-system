<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $primaryKey = 'asset_tag';
    protected $keyType = 'string';
    public $incrementing = false;

    use HasFactory;

    protected $guarded = [];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('asset_tag', 'like', '%' . $search . '%')
                    ->orWhere('serial_number', 'like', '%' . $search . '%')
                    ->orWhere('mac_address', 'like', '%' . $search . '%')
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
}
