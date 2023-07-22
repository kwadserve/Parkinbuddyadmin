<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignParking extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_id',
        'operator_id',
        'parking_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
