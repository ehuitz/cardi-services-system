<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'id';
    //protected $keyType = 'string';
    //public $incrementing = false;

    use HasFactory;

    protected $guarded = [];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function devices() {
        return $this->hasMany(Device::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function staff() {
        return $this->belongsToMany(Staff::class)->using(DepartmentStaff::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')
                    // ->orWhere('serial_number', 'like', '%' . $search . '%')
                    // ->orWhere('mac_address', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['sortField'] ?? false, fn($query, $sortField) =>
            $query->when($filters['sortAsc'] ?? false, fn($query, $sortAsc) =>
                $query->orderBy($sortField, 'DESC')
            )
        );

        // $query->when($filters['model'] ?? false, fn($query, $model) =>
        //     $query->where('model_id', $model)
        // );

        $query->when($filters['country'] ?? false, fn($query, $country) =>
            $query->where('country_id', $country)
        );
    }
}
