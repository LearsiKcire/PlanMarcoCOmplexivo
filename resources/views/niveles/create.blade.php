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
            <div class="card-header">Crear Nivel
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('niveles.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'niveles.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        {!! Form::text('descripcion', null, array('placeholder' => 'Nombre nivel','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection