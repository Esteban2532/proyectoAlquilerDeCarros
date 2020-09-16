<?php

namespace App\Http\Controllers;

use App\vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = vehicle::all();
        return view('inicio.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'placa' => 'required|unique:vehicles',
            'color' =>  'required|string',
            'anio' =>  'required|numeric',
            'modelo' => 'required|string',
            'valor' => 'required|numeric',
            'disponibilidad' => 'required'
        ]);


        $vehicle = new vehicle($data);
        $vehicle->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = vehicle::find($id);

        return view('vehiculo.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo = vehicle::find($id);

        $data = $request->validate([
            'color' =>  'required|string',
            'anio' =>  'required|numeric',
            'modelo' => 'required|string',
            'valor' => 'required|numeric',
            'disponibilidad' => 'required'
        ]);

        $vehiculo->color = $data['color'];
        $vehiculo->anio = $data['anio'];
        $vehiculo->modelo = $data['modelo'];
        $vehiculo->valor = $data['valor'];
        $vehiculo->disponibilidad = $data['disponibilidad'];

        $vehiculo->save();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = vehicle::find($id);

        $vehicle->delete();

        return redirect('/');
    }
}
