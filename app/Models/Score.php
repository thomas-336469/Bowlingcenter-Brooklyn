<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'name',
        'score',
    ];

    public function userReservation()
    {
        return $this->belongsTo(UserReservation::class);
    }

    public function getScores($id)
    {
        return $this->select(
            'id',
            'reservation_id',
            'name',
            'score',
        )
            ->from('scores')
            ->where('reservation_id', $id)
            ->get();
    }

    public function getReservationId($user_id)
    {
        return $this->select(
            'id',
        )
            ->from('user_reservations')
            ->where('user_id', $user_id)
            ->get();
    }
}
