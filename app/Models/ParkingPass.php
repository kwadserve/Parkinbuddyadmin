<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingPass extends Model
{
    use HasFactory;
    protected $fillable = [
        'parking_id',
        'pass_id',
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class, 'parking_id');
    }

    public function pass()
    {
        return $this->belongsTo(Pass::class, 'pass_id');
    }
}
