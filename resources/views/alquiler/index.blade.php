@extends('layouts.app')

@section('content')
   <div class="container ">
       <div class="row">
            <div class="col-sm-3 mt-3">
                <div class="card text-white">
                    <div class="card-header bg-info font-weight-bold">
                    Placa vehiculo:   {{ $vehiculo->placa }}
                    </div>
                    <div class="card-body bg-dark ">
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
                </div>
            </div>
            <div class="col-sm-9">
                <form action="{{ route('rent.store') }}" method="POST" class="col-md-9 col-xs-12 card card-body" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="border p-4">
                        <legend class="text-primary">DATOS DE ALQUILER</legend>

                        <div class="form-group">
                            <label for="">Fecha Salida y Regreso</label>
                            <div class="input-group">
                                <input name="fecha_salida" id="fecha_salida" type="date" required  class="fecha_salida form-control" >
                                <input name="fecha_regreso" id="fecha_regreso" type="date" required  class="form-control fecha_regreso">

                                @error('fecha_salida')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                                @error('fecha_regreso')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="documento">Documento</label>
                            <input id="documento"class="form-control @error('documento') is-invalid @enderror " value="{{ old('documento') }}" type="text" name="documento" required>
                            @error('documento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control @error('nombre') is-invalid @enderror " value="{{ old('nombre') }}" type="text" name="nombre" required>
                            @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" type="email" name="email" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="medio_pago">Medio de Pago</label>

                            <select name="medio_pago" id="medio_pago" class="form-control" required>
                                <option value="PSE">PSE</option>
                                <option value="TC VISA">TARJETA DE CREDITO VISA</option>
                                <option value="TC MASTERCARD">TAJETA DE CREDITO MASTERCARD</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="total">Valor a Pagar</label>
                            <input id="total"class="form-control @error('total') is-invalid @enderror " value="0" type="text" name="total" required>
                            @error('total')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>


                        <div class="form-group">
                            <input hidden value="{{ $vehiculo->id }}" id="id_vehiculo" class="form-control @error('fecha_salida') is-invalid @enderror " value="{{ old('fecha_salida') }}" type="text" name="id_vehiculo">
                        </div>
                    </fieldset>


                    <div class="form-group">
                        <button class="btn btn-info">Pagar</button>
                        <a type="button" href="{{ route('index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
