<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Persona extends Model
{
    protected $table = "personas";
    use HasFactory;
  
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_persona');
        
    }


}
