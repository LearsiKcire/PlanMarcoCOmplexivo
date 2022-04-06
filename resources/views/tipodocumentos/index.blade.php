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
            <div class="card-header">Tipos de documentos
                @can('tipodocumento-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('tipodocumentos.create') }}">Nuevo Tipo de Documento</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Tipo de Documento</th>
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $tpDoc)
                            <tr>
                                <td>{{ $tpDoc->id }}</td>
                                <td>{{ $tpDoc->nombre }}</td>
                                
                                <td>
                                    <a class="btn btn-success" href="{{ route('tipodocumentos.show',$tpDoc->id) }}">ver</a>
                                    @can('tipodocumento-edit')
                                        <a class="btn btn-primary" href="{{ route('tipodocumentos.edit',$tpDoc->id) }}">Editar</a>
                                    @endcan
                                    @can('tipodocumento-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['tipodocumentos.destroy', $tpDoc->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection