<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persoons extends Model
{
    use HasFactory;

    protected $table = '_persoons';


    protected $fillable = [
        'Id',
        'TypePersoonId',
        'Voornaam',
        'Tussenvoegsel',
        'Achternaam',
        'Roepnaam',
        'IsVolwassen',
    ];

    public function typePersoons()
    {
        return $this->belongsTo(TypePersoons::class, 'type_persoons_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'persoons_id');
    }
}
