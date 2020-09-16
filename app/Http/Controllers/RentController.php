<?php

namespace App\Http\Controllers;

use App\Arquiler;
use App\Rent;
use App\vehicle;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fecha_salida' =>  'required|date',
            'fecha_regreso' =>  'required|date|after:fecha_salida',
            'documento' => 'required|numeric',
            'nombre' => 'required|string',
            'email' => 'required|email|unique:rents',
            'medio_pago' => 'required:string',
            'total' => 'required|numeric',

        ]);

        $arquiler = new Rent($data);
        $arquiler->id_vehiculo = $request->id_vehiculo;
        $arquiler->save();

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Arquiler  $arquiler
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = vehicle::find($id);
        return view('alquiler.index', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Arquiler  $arquiler
     * @return \Illuminate\Http\Response
     */
    public function edit(Arquiler $arquiler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Arquiler  $arquiler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arquiler $arquiler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Arquiler  $arquiler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arquiler $arquiler)
    {
        //
    }
}
