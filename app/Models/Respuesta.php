<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';

    public $timestamps = false;
    
    protected $fillable = [
        'categoria',
        'palabras_clave',
        'respuesta',
        'estado'
    ];
}
