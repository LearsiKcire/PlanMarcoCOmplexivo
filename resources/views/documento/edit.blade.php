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
            <div class="card-header">Cargar Ducumento Pdf
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('documento.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
            {!! Form::model($documento, ['route' => ['documento.update', $documento->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    
                    <strong>Archivo:</strong>

                    <input type="file" name="ruta" id="ruta" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection