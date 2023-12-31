<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Rol extends Model
{
    protected $table = "rols";
    use HasFactory;

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_rol');
        
    }

  
    public function enlaces(): HasMany
    {
        return $this->hasMany(Enlace::class, 'id_pagina');
        return $this->hasMany(Enlace::class, 'id_rol');
    }

}
