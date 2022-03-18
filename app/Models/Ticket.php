<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('id', $category)
            )
        );

        $query->when($filters['department'] ?? false, fn($query, $department) =>
            $query->whereHas('department', fn($query) =>
                $query->where('id', $department)
            )
        );

        if (array_key_exists('status', $filters)) {
            if ($filters['status'] === 'all')
                $stat = false;
            else
                $stat = $filters['status'];
        }

        $query->when($stat ?? '1,2', fn($query, $status) =>
            $query->whereHas('status', fn($query) =>
                $query->whereIn('id', explode(',', $status))
            )
        );


        if (array_key_exists('staff', $filters)) {
            if ($filters['staff'] === 'all')
                $s = false;
            else
                $s = $filters['staff'];
        } else {
            if(request()->route()->named('tickets.index'))
                $s = auth()->user()->id;
            else
                $s = false;
        }

        $query->when($s, fn($query, $staff) =>
            $query->whereHas('staff', fn($query) =>
                $query->where('id', $staff)
            )
        );

        if (array_key_exists('country', $filters)) {
            if ($filters['country'] === 'all')
                $b = false;
            else
                $b = $filters['country'];
        } else {
            $b = Staff::where('user_id', auth()->user()->id)->first()->country_id ?? false;
        }

        $query->when($b, fn($query, $country) =>
            $query->whereHas('country', fn($query) =>
                $query->where('id', $country)
            )
        );
    }
   

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function countryy() {
        return $this->belongsTo(Country::class)->using(Department::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function staff() {
        return $this->belongsToMany(Staff::class)->using(StaffTicket::class);
    }

    public function messages() {
        return $this->hasMany(Message::class, 'ticket_id');
    }
}
