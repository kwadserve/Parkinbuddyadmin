<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role_id',
        'status',
        'profile_image',
        'login_type',
        'first_name',
        'last_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }


    /**
	 * Relations between the user and the bookings
	 */
	public function bookings() {
		return $this->hasMany(Booking::class,'user_id','id');
	}

    public function passes()
    {
        return $this->belongsToMany(ParkingPass::class, 'user_passes');
    }

    public function assignedParkings()
    {
        return $this->hasMany(AssignParking::class, 'operator_id');
    }

	public function vehicle() {
		return $this->hasOne(Vehicle::class,'user_id','id');
	}



}
