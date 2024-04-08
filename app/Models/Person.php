<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_type_id',
        'first_name',
        'middle_name',
        'last_name',
        'call_name',
        'is_adult',
    ];

    public function personType()
    {
        return $this->belongsTo(PersonType::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
