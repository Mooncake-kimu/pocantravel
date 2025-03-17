<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'bus_number',
        'seat_capacity',
        'route',
    ];

    // Definisikan relasi satu-ke-banyak dengan tiket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}