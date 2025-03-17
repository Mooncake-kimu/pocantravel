<?php

// App\Models\Ticket.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_id',
        'departure_time',
        'departure_city',
        'destination_city',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}