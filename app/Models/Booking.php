<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'full_name',
        'email',
        'check_in',
        'check_out',
        'guests',
        'status',
        'special_requests',
        'phone',
        'total_price'
    ];

    /**
     * Get the room associated with the booking.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
