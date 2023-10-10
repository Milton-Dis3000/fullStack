<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Pagina extends Model
{
    protected $table = "paginas";
    use HasFactory;
  
    public function enlaces(): HasMany
    {
        return $this->hasMany(Enlace::class, 'id_pagina');
        return $this->hasMany(Enlace::class, 'id_rol');
    }
}
