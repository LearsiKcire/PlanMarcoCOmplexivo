@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Opps!</strong> Algo salió mal, verifique los errores a continuación.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">Crear Documento
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('documento.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'documento.store','method'=>'POST')) !!}


                @foreach ($uc as $user)
                <div class="form-group">
                    <strong>Pertenece a:</strong>
                    <select name="user_id" id="user_id" class="form-control" >
                        <option value="{{ $user->id }}" selected >{{ $user->name_f }} {{ $user->apellido_f}}</option>

                    </select>
                </div>
                <div class="form-group">
                    <strong>Nivel:</strong>
                    <select name="nivel_id" id="nivel_id" class="form-control" >
                        <option value="{{ $user->nivel_id }}" selected >{{ $user->nivel }}</option>
                    </select>
                </div>
                @endforeach
                <div class="form-group">
                    <strong>Tipo de Documento:</strong>
                    <select name="tipoDocumento_id" id="tipoDocumento_id" class="form-control">
                        <option value=""> -- Seleccione el tipo de documento que desea crear--</option>
                        @foreach ($tp as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Archivo:</strong>

                    <input type="file" name="ruta" id="ruta" disabled>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection