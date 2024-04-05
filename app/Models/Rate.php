<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekday',
        'period',
        'rental_price',
    ];

    public function workerReservations()
    {
        return $this->hasMany(WorkerReservation::class);
    }

    public function userReservations()
    {
        return $this->hasMany(UserReservation::class);
    }
}
