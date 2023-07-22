<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'type',
        'title',
        'expiry_time',
        'amount',
        'vehicle_type',
        'type',
        'total_hours',
        'status'

    ];

     /**
	 * Relations between the user and the pass
	 */
	public function userPasses() {
		return $this->hasMany(UserPass::class,'user_id','id');
	}

    public function parkings()
    {
        return $this->belongsToMany(Parking::class, 'parking_passes');
    }


    public function parkingPasses()
{
    return $this->hasMany(ParkingPass::class);
}

}
