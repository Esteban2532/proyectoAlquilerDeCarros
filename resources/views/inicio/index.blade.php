@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach($vehiculos as $vehiculo)
            <div class="col-sm-3 mt-3">
                <div class="card">
                    <div class="card-header font-weight-bold">
                       Placa vehiculo:   {{ $vehiculo->placa }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Modelo: {{ $vehiculo->modelo }}</h5>
                        <p class="mt-0">Color: {{ $vehiculo->color }}</p>
                        <p class="mt-0">Año: {{ $vehiculo->anio }}</p>
                        <p class="font-weight-bold"> $ {{ number_format($vehiculo->valor, 2) }} x día</p>

                        @if($vehiculo->disponibilidad === 0)
                           <p class="badge badge-danger">Inactivo</p>
                        @else
                          <p class="badge badge-success">Activo</p>
                        @endif

                    </div>
                    <div class="card-footer">

                        @guest
                            <button class="btn btn-info w-100"><span class="text-white"> Arquilar</span></button>
                        @else
                            <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-info w-100"><span class="text-white"> Arquilar</span></button>
                                </div>
                                <div class="col-6 mt-2">
                                    <a class="btn btn-success w-100"><i class="fa fa-edit"></i></a>
                                </div>
                                <div class="col-6 mt-2">
                                    <form method="POST" action="{{ url("vehiculo/eliminar/{$vehiculo->id}") }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100"><i class="fa fa-remove"></i></button>
                                  </form>
                                </div>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
@endsection