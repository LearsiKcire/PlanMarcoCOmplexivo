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
            <div class="card-header">Estudiantes
            
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Nivel actual</th>
                            
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name_f}} {{ $user->name_s }} {{ $user->apellido_f }} {{ $user->apellido_s }}</td>
                                <td>{{ $user->cedula }}</td>
                                <td>{{ $user->nivel }}</td>
                                <td>
                                @can('documento-create')
                                <a class="btn btn-primary" href="{{ route('documento.create', ['useres'=>$user->id] ) }}">Nuevo Documento</a>
                                @endcan
                                    <a class="btn btn-success" href="{{ route('documento.show',$user->id) }}">ver documentos</a>
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