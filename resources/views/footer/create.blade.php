@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
        <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('footer.index') }}">Atras</a>
                </span>
            <strong>Opps!</strong> Algo salió mal, verifique los errores a continuación.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">Crear Pie de pagina
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('footer.index') }}">Atras</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'footer.store','method'=>'POST')) !!}
                <div class="form-group">
                    <strong>Conocimineto:</strong>
                    {!! Form::text('conocimineto', null, array('placeholder' => 'conocimineto','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Procedimentales:</strong>
                    {!! Form::text('procedimentales', null, array('placeholder' => 'procedimentales','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Estudiantiles:</strong>
                    {!! Form::text('estudiantiles', null, array('placeholder' => 'estudiantiles','class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    <strong>Tipo de documento:</strong>

                    <select name="department" id="department" class="form-control">
                        <option value=""> -- Seleccione --</option>
                        @foreach ($tipodocumentos as $key=>$tpdoc)
                        <option value="{{ $tpdoc->id }}">{{ $tpdoc->nombre }}</option>
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