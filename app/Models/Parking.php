<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingMeta;

class Parking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'place_type',
        'city',
        'state',
        'pin_code',
        'address',
        'latitude',
        'longitude',
        'assigned',
        'operator_id',
        'manager_id',

    ];

    public function parkingMeta()
    {
        return $this->hasMany(ParkingMeta::class,'parking_id','id');
    }
     /**
	 * Relations between the trip and the bookings
	 */
	public function bookings() {
		return $this->hasMany(Booking::class,'parking_id','id');
	}


    public function passes()
    {
        return $this->belongsToMany(Pass::class, 'parking_passes');
    }

}
