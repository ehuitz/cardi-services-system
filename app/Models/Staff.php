<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function departments() {
        return $this->belongsToMany(Department::class)->using(DepartmentStaff::class);
    }

    public function countries() {
        return $this->belongsToMany(Country::class)->using(CountryStaff::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryStaff::class);
    }

    public function tickets() {
        return $this->belongsToMany(Ticket::class)->using(StaffTicket::class);
    }
}
