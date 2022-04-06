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
            
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>estudiante</th>
                            <th>tipo documento</th>
                            <th>nivel</th>
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informacion as $user)
                            <tr>
                                <td>{{ $user->id_doc }}</td>
                                <td>{{ $user->name_f}} {{ $user->name_s }} {{ $user->apellido_f }} {{ $user->apellido_s }}</td>
                                <td>{{ $user->tp_doc}}</td>
                                <td>{{$user->nivel}}</td>
                                <td>
                                
                                <a class="btn btn-primary" href="{{ route('detalle.show',$user->id_doc) }}">ver detalles</a>
                                
                                @can('detalle-create')
                                <a class="btn btn-primary" href="{{ route('detalle.create', ['documeto'=>$user->id_doc] ) }}">Agregar detalle</a>
                                @endcan 
                                @can('detalle-edit')
                                <a class="btn btn-primary" href="{{ route('detalle.edit',$user->id_doc) }}">editar detalles</a>
                                @endcan
                                    @can('documento-edit')
                                        <a class="btn btn-primary" href="{{ route('documento.edit',$user->id_doc) }}">Cargar archivo</a>
                                    @endcan 
                                     @can('documento-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['documento.destroy', $user->id_doc],'style'=>'display:inline']) !!}
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