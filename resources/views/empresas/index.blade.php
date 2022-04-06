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
            <div class="card-header">Empresa
                @can('empresa-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('empresas.create') }}">Nueva empresa</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Empresa</th>
                            <th>Gerente</th>
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->gerente }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('empresas.show',$empresa->id) }}">ver</a>
                                    @can('empresa-edit')
                                        <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa->id) }}">Editar</a>
                                    @endcan
                                    @can('empresa-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['empresas.destroy', $empresa->id],'style'=>'display:inline']) !!}
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