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
            <div class="card-header">Editar PDF
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('pdfs.index') }}">Atras edit</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($pdf, ['route' => ['pdfs.update', $pdf->id], 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                    
                    <div class="form-group">
                        <strong>Usuario:</strong>
                        {!! Form::number('user_id', null, array('placeholder' => 'id de usuario','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Nivel:</strong>
                        {!! Form::number('nivel_id', null, array('placeholder' => 'id de nivel','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Archivo:</strong>
                        {!! Form::file('ruta', null, array('placeholder' => 'selecione un archivo','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection