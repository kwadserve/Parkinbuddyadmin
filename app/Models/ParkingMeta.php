<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parking;

class ParkingMeta extends Model
{
    use HasFactory;
    protected  $table = 'parking_meta';

    protected $fillable = [
        'parking_id',
        'vehicle_type',
        'capacity',
        'rate',
        'remaining',
        'extended_rate'
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
