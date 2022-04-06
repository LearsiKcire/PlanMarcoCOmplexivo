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
            <div class="card-header">
                <h2>Esta observando los detalles al Documento {{$documento[0]->nombre}}</h2>
                <h3>Perteneciente a {{$documento[0]->name_f}} {{$documento[0]->apellido_f}}</h3>
                <h4>nivel: {{$documento[0]->descripcion}} </h4>

                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('documento.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
               
                @if ($documento[0]->tipoDocumento_id == 1)
                @foreach ($detalles as $detalle)
                <div class="container  border border-primary">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label">Objetivo de aprendizaje</label>
                        </div>
                        <div class="col-3">
                            <label for="" class="col-form-label">Nivel de Logro esperado</label>
                        </div>
                        <div class="col-2">
                            <label for="" class="col-form-label">Nivel real alcanzado</label>
                        </div>
                        <div class="col-4">
                            <label for="" class="col-form-label">Tareas laborales de aprendizaje a realizar para alcanzar el objetivo</label>
                        </div>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-auto">
                           
                            <textarea name="" id="" cols="30" rows="3" readonly>{{$detalle->descripcion}}</textarea>
                        </div>
                        <div class="col-auto">
                           <input type="text" value="{{$detalle->nivelEsperado}}" readonly>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="" id="" value="{{$detalle->nivelAlcanzado}}" readonly>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="" class="form-control" value="{{$detalle->tarea}}" readonly>
                        </div>

                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">
                            <label for="" class="col-form-label">Puesto de aprendizaje</label>
                        </div>
                        <div class="col-auto">
                            <label for="" class="col-form-label">No. de semanas de trabajo</label>
                        </div>
                        <div class="col-auto">
                            <label for="" class="col-form-label">Responsable del puesto de aprendizaje</label>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-4">
                            <input type="text" name="" class="form-control" readonly value="{{$detalle->area}}">
                        </div>
                        <div class="col-auto">
                            <input type="number" min="1" max="9" name="" readonly class="form-control" value="{{$detalle->numeroSemana}}">
                        </div>
                        <div class="col-auto">
                            <input type="text" id="responsable" name="" readonly class="form-control" value="{{$detalle->responsable}}">
                        </div>

                    </div>
                    <br>
                </div>
                <br>
                @endforeach
                @endif
                @if($documento[0]->tipoDocumento_id == 2)
                @foreach ($detalles as $detalle)
                <div class="container  border border-primary">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <label for="" class="col-form-label">Objetivo de aprendizaje</label>
                        </div>
                        <div class="col-4">
                            <label for="" class="col-form-label">Puesto de aprendizaje</label>
                        </div>
                        <div class="col-auto">
                            <label for="" class="col-form-label">No. de semanas de trabajo</label>
                        </div>

                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <textarea name="" id="" cols="30" rows="3" readonly>{{$detalle->otrosObjetivos}}</textarea>
                        </div>
                        <div class="col-4">
                            <input type="text" name="" class="form-control" value="{{$detalle->area}}" readonly>
                        </div>
                        <div class="col-auto">
                            <input type="number" min="1" max="9" name="" class="form-control" readonly value="{{$detalle->numeroSemana}}">
                        </div>
                        <div class="col-auto">
                            <input name="responsable[]" type="hidden" value="">
                        </div>

                    </div>
                    <br>
                </div>
                <br>
                @endforeach
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection