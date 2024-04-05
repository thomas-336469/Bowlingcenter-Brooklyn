<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alley_id',
        'rate_id',
        'option_id',
        'date',
        'duration',
        'total_cost',
        'amount_of_people',
        'amount_of_children'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alley()
    {
        return $this->hasOne(Alley::class);
    }

    public function rate()
    {
        return $this->hasOne(Rate::class);
    }

    public function option()
    {
        return $this->hasOne(Option::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
