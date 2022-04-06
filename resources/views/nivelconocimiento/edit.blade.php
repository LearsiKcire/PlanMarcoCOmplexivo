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
            <div class="card-header">Editar niveles de conocimiento
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('nivelconocimiento.index') }}">Atras</a>
                </span>
            </div>

            <div class="card-body">
                
                {!! Form::model($nvConocimiento, ['route' => ['nivelconocimiento.update', $nvConocimiento->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    <strong>Conocimineto Basico:</strong>
                    {!! Form::text('conocimientoBasico', null, array('placeholder' => 'ingrese un texto','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Conocimineto:</strong>
                    {!! Form::text('conocimiento', null, array('placeholder' => 'ingrese un texto','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Participación Procedimental:</strong>
                    {!! Form::text('participacionProcedimental', null, array('placeholder'=>'ingrese un texto','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Valoración:</strong>
                    {!! Form::text('valoracion', null, array('placeholder' => 'ingrese un texto','class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <strong>Nivel:</strong>

                    <select name="nivel_id" id="nivel_id" class="form-control">
                        <option value=""> -- Seleccione el nivel al que pertenece--</option>
                        @foreach ($nivel as $key=>$lv)
                        <option value="{{ $lv->id }}">{{ $lv->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection