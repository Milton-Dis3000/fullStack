<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    use HasFactory;

    public function pagina()
    {
        return $this->belongsTo(Pagina::class, 'id_pagina');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
