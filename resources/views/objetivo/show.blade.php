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
            <div class="card-header">Objetivos del @foreach ($nivel as $key => $lv) {{$lv->descripcion}}  @endforeach Nivel
                @can('objetivo-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('niveles.create') }}">Nuevo Objetivo</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Objetivos</th>
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($objects as $key => $obj)
                            <tr>
                                <td>{{ $obj->id }}</td>
                                <td>{{ $obj->descripcion }}</td>
                                <td>
                                    @can('objetivo-edit')
                                        <a class="btn btn-primary" href="{{ route('objetivo.edit',$obj->id) }}">Editar</a>
                                    @endcan 
                                     @can('objetivo-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['objetivo.destroy', $obj->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection