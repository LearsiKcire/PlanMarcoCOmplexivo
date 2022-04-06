@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">niveles de conocimiento
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('nivelconocimiento.create') }}">Nuevo Nivel de conocimiento</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nivel al que eprtenece</th>
                            <th>Conocimiento Basico</th>
                            <th>Conocimiento</th>
                            <th>Participacion Procedimentales</th>
                            <th>Valoracion</th>

                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $nivelconocimiento)
                            <tr>
                                <td>{{ $nivelconocimiento->id }}</td>
                                <td>{{ $nivelconocimiento->nivel_id }}</td>
                                <td>{{ $nivelconocimiento->conocimientoBasico }}</td>
                                <td>{{ $nivelconocimiento->conocimiento }}</td>
                                <td>{{ $nivelconocimiento->participacionProcedimental }}</td>
                                <td>{{ $nivelconocimiento->valoracion }}</td>
                               
                                <td>
                                    <a class="btn btn-success" href="{{ route('nivelconocimiento.show',$nivelconocimiento->id) }}">ver</a>
                                    @can('nivelconocimiento-edit')
                                        <a class="btn btn-primary" href="{{ route('nivelconocimiento.edit',$nivelconocimiento->id) }}">Editar</a>
                                    @endcan
                                    @can('nivelconocimiento-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['nivelconocimiento.destroy', $nivelconocimiento->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
@endsection