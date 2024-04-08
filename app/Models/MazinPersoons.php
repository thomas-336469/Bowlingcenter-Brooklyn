<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MazinPersoons extends Model
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
        return $this->belongsTo(MazinTypePersoons::class, 'type_persoons_id');
    }

    public function reservations()
    {
        return $this->hasMany(MazinReservation::class, 'persoons_id');
    }
}
