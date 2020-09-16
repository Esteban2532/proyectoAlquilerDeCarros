<?php

namespace App\Http\Controllers;

use App\Arquiler;
use App\Rent;
use App\vehicle;
use Illuminate\Http\Request;
use App\Exports\RentExport;
use App\RentDetail;
use Maatwebsite\Excel\Facades\Excel;


class RentController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha_salida' =>  'required|date',
            'fecha_regreso' =>  'required|date|after:fecha_salida|',
            'documento' => 'required|numeric',
            'nombre' => 'required|string',
            'email' => 'required|email',
            'medio_pago' => 'required:string',
            'total' => 'required|numeric',
            'valor' => 'required',

        ]);


        $valor = $data['valor'];
        $arquiler = new Rent($data);
        $arquiler->id_vehiculo = $request->id_vehiculo;

        $arquiler->save();

        $inicial = strtotime($data['fecha_salida']);
        $fin = strtotime($data['fecha_regreso']);

        for ($i=$inicial; $i <= $fin  ; $i+= 86400) {
            $detalleAlquiler = new RentDetail();
            $detalleAlquiler->fechas = date('Y-m-d', $i);
            $detalleAlquiler->id_rent = $arquiler->id;
            $detalleAlquiler->valor = $valor;
            $detalleAlquiler->save();
        }

        return redirect('/');
    }


    public function show($id)
    {
        $vehiculo = vehicle::find($id);
        return view('alquiler.index', compact('vehiculo'));
    }

    public function index(){
        return view('alquiler.busqueda');
    }

    public function informe(Request $request){

        $data = $request->validate([
            'fecha_salida' =>  'required|date',
            'fecha_regreso' =>  'required|date|after:fecha_salida|',
        ]);

        $fechaInicio = $data['fecha_salida'];
        $fechaFin = $data['fecha_regreso'];


        return Excel::download(new RentExport($fechaInicio, $fechaFin), 'rents.csv');



    }

}
