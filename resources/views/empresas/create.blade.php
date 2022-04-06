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
            <div class="card-header">Crear Empresa
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('empresas.index') }}">Empresas</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'empresas.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Nombre de la empresa:</strong>
                        {!! Form::text('nombre', null, array('placeholder' => 'nombre ','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Nombre del gerente:</strong>
                        {!! Form::text('gerente', null, array('placeholder' => 'gerente','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection