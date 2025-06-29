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
        'reference', 'room_id', 'check_in', 'check_out', 'guests', 'name', 'email', 'phone', 'special_requests', 'user_id',  'status'];    


    /**
     * Get the room associated with the booking.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

public function review()
{
    return $this->hasOne(Review::class);
}


}
