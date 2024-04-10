<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePersoons extends Model
{
    use HasFactory;

    protected $table = '_type_persoons';

    protected $fillable = [
        'Id',
        'Naam',
    ];

    public function persons()
    {
        return $this->hasMany(Persoons::class, 'type_persoons_id');
    }
}
