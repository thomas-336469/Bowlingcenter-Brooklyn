<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MazinTypePersoons extends Model
{
    use HasFactory;

    protected $table = '_type_persoons';

    protected $fillable = [
        'Naam',
    ];
}
