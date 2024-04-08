<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'reservation_number',
        'reservation_date',
        'reservation_start_time',
        'reservation_end_time',
        'number_of_adults',
        'number_of_children',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function alley()
    {
        return $this->belongsTo(Alley::class);
    }
}
