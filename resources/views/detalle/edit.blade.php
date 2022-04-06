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
                <h2>Esta agregando detalles al Documento {{$documento[0]->nombre}}</h2>
                <h3>Perteneciente a {{$documento[0]->name_f}} {{$documento[0]->apellido_f}}</h3>
                <h4>nivel: {{$documento[0]->descripcion}} </h4>

                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('documento.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'detalle.store','method'=>'POST')) !!}
                @if ($documento[0]->tipoDocumento_id == 1)
                @foreach ($detalles as $obj)
                <div class="container  border border-primary">
                    <div class="row align-items-center">
                        <input name="documento_id[]" type="hidden" value="{{$documento[0]->id}}">
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
                            <input name="objetivo_id[]" type="hidden" value="{{$obj->id}}">
                            <input name="otrosObjetivos[]" type="hidden" value="">
                            <textarea name="" id="" cols="30" rows="3" readonly>{{$obj->descripcion}}</textarea>
                        </div>
                        <div class="col-auto">
                            <select name="nivelEsperado[]" class="form-control col-10 ">
                                <option value=""> --nivel esperado--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                        </div>
                        <div class="col-auto">
                            <select name="nivelAlcanzado[]" class="form-control col-10">
                                <option value=""> --nivel real alcanzado--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="tarea[]" class="form-control" placeholder="ingrese su tarea">
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
                            <input type="text" name="area[]" class="form-control">
                        </div>
                        <div class="col-auto">
                            <input type="number" min="1" max="9" name="numeroSemana[]" class="form-control">
                        </div>
                        <div class="col-auto">
                            <input type="text" id="responsable" name="responsable[]" class="form-control">
                        </div>

                    </div>
                    <br>
                </div>
                <br>
                @endforeach
                @endif
                @if($documento[0]->tipoDocumento_id == 2)
                @foreach ($detalles as $obj)
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
                            <input name="documento_id[]" type="hidden" value="{{$documento[0]->id}}">
                            <input name="objetivo_id[]" type="hidden" value="1">
                            <textarea name="otrosObjetivos[]" id="" cols="30" rows="3"></textarea>
                            <input name="nivelEsperado[]" type="hidden" value="">
                            <input name="nivelAlcanzado[]" type="hidden" value="">
                            <input name="tarea[]" type="hidden" value="">
                            <input name="nivelAlcanzado[]" type="hidden" value="">
                        </div>
                        <div class="col-4">
                            <input type="text" name="area[]" class="form-control">
                        </div>
                        <div class="col-auto">
                            <input type="number" min="1" max="9" name="numeroSemana[]" class="form-control">
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
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection