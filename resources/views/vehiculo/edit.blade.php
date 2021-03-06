@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">FORMULARIO DE VEHÍCULO</div>
                <div class="container">
                    <form
                    action="{{route('vehiculo.update', ['vehiculo' => $vehiculo->id ])}}"
                    method="POST"
                >
                @csrf
                @method('PUT')
                    <div class="form-group mt-2" >
                       <input value="{{ $vehiculo->placa }}"  disabled id="placa" class="form-control @error('placa') is-invalid @enderror " type="text" name="placa" placeholder="Escriba el placa del vehículo" value="{{ old('placa') }}">
                        @error('placa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <input  value="{{ $vehiculo->color }}"  id="color" class="form-control @error('color') is-invalid @enderror " type="text" name="color" placeholder="Escriba el color del vehículo" value="{{ old('color') }}">
                         @error('color')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                    <div class="form-group ">
                        <input  value="{{ $vehiculo->anio }}"  id="anio" class="form-control @error('anio') is-invalid @enderror " type="text" name="anio" placeholder="Escriba el año del vehículo" value="{{ old('anio') }}">
                         @error('anio')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                    <div class="form-group ">
                        <input  value="{{ $vehiculo->modelo }}"  id="modelo" class="form-control @error('modelo') is-invalid @enderror " type="text" name="modelo" placeholder="Escriba el modelo del vehículo" value="{{ old('modelo') }}">
                         @error('modelo')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>

                    <div class="form-group ">
                        <input  value="{{ $vehiculo->valor }}"  id="valor" class="form-control @error('valor') is-invalid @enderror " type="text" name="valor" placeholder="Escriba el valor de alquiler del vehículo por día" value="{{ old('valor') }}">
                         @error('valor')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>


                    <div class="form-group">
                        <select id="disponibilidad" class="form-control" name="disponibilidad">
                            <option value="1" class="selected">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-info">Actualizar</button>
                        <a type="button" href="{{ route('index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
