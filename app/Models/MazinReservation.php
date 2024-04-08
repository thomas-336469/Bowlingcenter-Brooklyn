<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MazinReservation extends Model
{
    use HasFactory;

    protected $table = '_reserverings';


    protected $fillable = [
        'Id',
        'Reserveringsnummer',
        'PersoonId',
        'OpeningstijdId',
        'TariefId',
        'BaanId',
        'PakketOptieId',
        'ReserveringStatusID',
        'datum',
        'AantalUren',
        'BeginTijd',
        'EindTijd',
        'AantalVolwassen',
        'AantalKinderen',
    ];

    public function person()
    {
        return $this->belongsTo(MazinPersoons::class, 'PersoonId');
    }

    public function baan()
    {
        return $this->belongsTo(Baan::class, 'BaanId');
    }
}
