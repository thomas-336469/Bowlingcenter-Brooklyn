<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = '_reserverings';
    protected $primaryKey = 'BaanId';

    protected $fillable = [
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
        return $this->belongsTo(Persoons::class, 'PersoonId');
    }

    public function baan()
    {
        return $this->belongsTo(Baan::class, 'BaanId');
    }
}
