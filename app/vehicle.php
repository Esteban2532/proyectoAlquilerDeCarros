<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = [
        'placa', 'color', 'anio', 'modelo', 'valor', 'disponibilidad',
    ];
}
