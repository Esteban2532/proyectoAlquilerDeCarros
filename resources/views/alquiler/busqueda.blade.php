@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('rent.informe') }}" method="POST" class="col-md-9 col-xs-12 card card-body" enctype="multipart/form-data">
            @csrf
            <fieldset class="border p-4">
                <legend class="text-primary">INFORME DE RENTAS</legend>

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

                <button class="btn btn-primary">DESCARGAR .csv</button>

            </fieldset>
        </form>
    </div>
</div>

@endsection