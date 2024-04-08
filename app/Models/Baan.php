<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baan extends Model
{
    use HasFactory;

    protected $table = 'baans';

    protected $fillable = [
        'Id',
        'Nummer',
        'HeeftHek',
    ];

    public function reservations()
    {
        return $this->hasMany(MazinReservation::class, 'BaanId');
    }
}
