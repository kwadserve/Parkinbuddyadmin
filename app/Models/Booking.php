<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Parking;
use App\Models\UserPass;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parking_id',
        'start_time',
        'end_time',
        'vehicle_type',
        'charges',
        'status',
        'booking_id',
        'parking_code',
        'user_pass_id',
        'payment_ids',
        'entry_time',
        'exit_time',
        'cash_collection'
    ];

    /**
     * The parking that belong to the booking.
     */
    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }

            /**
     * The bookinhg that belong to the User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
	 * Relations between the booking and the pass
	 */
	public function bookingPass() {
		return $this->hasOne(UserPass::class,'id','user_pass_id');
	}

}
