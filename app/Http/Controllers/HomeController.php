<?php

namespace App\Http\Controllers;

use App\vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vehiculos = vehicle::all();
        dd($vehiculos);

        /* return view('inicio.index', compact('vehiculos')); */
    }
}
