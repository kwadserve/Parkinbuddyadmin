<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pass;

class UserPass extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pass_id',
        'start_time',
        'end_time',
        'charges',
        'remaining_hours',
        'status',
        'payment_id',
    ];

    /**
     * The pass that belong to the User.
     */
    public function pass()
    {
        return $this->belongsTo(Pass::class);
    }
}
