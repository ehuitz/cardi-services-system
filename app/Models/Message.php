<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:M-d-y h:i a',
        'updated_at' => 'date:M-d-y h:i a'
    ];

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}
