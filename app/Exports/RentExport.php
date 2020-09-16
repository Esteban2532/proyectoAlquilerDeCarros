<?php

namespace App\Exports;

use App\Rent;
use App\RentDetail;
use App\vehicle;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;

class RentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(String $fechaInicio, String $fechaFin)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }


    public function collection()
    {
        $consulta  =  Rent::join('vehicles', 'rents.id_vehiculo' ,'=', 'vehicles.id' )
                            ->join('rent_details', 'rents.id', '=' ,'rent_details.id_rent')
                            ->select('rents.fecha_salida', 'rents.fecha_regreso', 'rents.documento', 'rents.nombre', 'rents.email', 'rents.medio_pago', 'rents.total',
                             'rent_details.fechas', 'rent_details.valor', 'vehicles.placa', 'vehicles.color', 'vehicles.anio', 'vehicles.modelo',
                             'vehicles.valor', 'vehicles.disponibilidad')
                            ->where('rent_details.fechas', '>=', $this->fechaInicio)
                            ->where('rent_details.fechas', '<=', $this->fechaFin)
                            ->get();


        return $consulta;
    }
}
