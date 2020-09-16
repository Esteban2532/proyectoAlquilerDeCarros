<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'fecha_salida', 'fecha_regreso', 'documento', 'nombre', 'email', 'medio_pago',  'id_vehiculo', 'total'
    ];
}
