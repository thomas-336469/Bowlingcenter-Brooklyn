<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alley extends Model
{
    use HasFactory;

    protected $fillable = [
        'alley_number',
        'has_bumpers',
    ];

    public function workerReservations()
    {
        return $this->hasMany(WorkerReservation::class);
    }

    public function userReservations()
    {
        return $this->hasMany(UserReservation::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
