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
            <div class="card-header">Editar Tipo de documento
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('tipodocumentos.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($tpDoc, ['route' => ['tipodocumentos.update', $tpDoc->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    <strong>Tipo documento:</strong>
                    {!! Form::text('nombre', null, array('placeholder' => 'descripcion tipo documento ','class' => 'form-control')) !!}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection