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
            <div class="card-header">Editar Objetivo
                <!-- <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('empresas.index') }}">Empresas</a>
                </span> -->
            </div>
            <div class="card-body">
                {!! Form::model($objetivo, ['route' => ['objetivo.update', $objetivo->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                    <strong>Descripcion del objetivo:</strong>
                        {!! Form::text('descripcion', null, array('placeholder' => 'texto aqui','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                    <strong>Nivel:</strong>
                        {!! Form::text('nivel_id', null, array('placeholder' => 'nivel','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection