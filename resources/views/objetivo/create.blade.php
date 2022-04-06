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
            <div class="card-header">Crear Objetivo
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('objetivo.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'objetivo.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Descripcion del objetivo:</strong>
                        {!! Form::text('descripcion', null, array('placeholder' => 'texto aqui ','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Nivel:</strong>
                        {!! Form::text('nivel_id', null, array('value'->$,'class' => 'form-control', ['readonly'])) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection