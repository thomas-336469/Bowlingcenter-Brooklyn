<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'score',
    ];

    public function userReservation()
    {
        return $this->belongsTo(UserReservation::class);
    }
}