<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate_id',
        'alley_id',
        'option_id',
        'user_name',
        'user_phone',
        'date',
        'duration',
        'total_cost',
        'amount_of_people',
        'amount_of_children',
    ];

    public function rate()
    {
        return $this->hasOne(Rate::class);
    }

    public function alley()
    {
        return $this->hasOne(Alley::class);
    }

    public function option()
    {
        return $this->hasOne(Option::class);
    }
}
