<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentDetail extends Model
{
    protected $fillable = [
        'fechas', 'id_rent', 'valor'
    ];
}
