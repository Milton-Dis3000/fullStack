<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'bitacora',
        'fecha',
        'hora',
        'ip',
        'so',
        'navegador',
        'usuario',
        'id_usuario'
    ];
}
