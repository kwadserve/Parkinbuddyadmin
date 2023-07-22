<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_id',
        'reason',
        'status',
        'refund_request_id'
    ];

    /**
     * The refund that belong to the booking.
     */

    public function booking()
    {
        return $this->hasOne(Booking::class,'id','booking_id');
    }

}
