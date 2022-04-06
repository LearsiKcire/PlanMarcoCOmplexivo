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
            <div class="card-header">Niveles
                @can('nivel-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('niveles.create') }}">Nuevo Nivel</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nivel</th>
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $nivel)
                            <tr>
                                <td>{{ $nivel->id }}</td>
                                <td>{{ $nivel->descripcion }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('niveles.show',$nivel->id) }}">ver</a>
                                    @can('nivel-edit')
                                        <a class="btn btn-primary" href="{{ route('niveles.edit',$nivel->id) }}">Editar</a>
                                    @endcan
                                    @can('nivel-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['niveles.destroy', $nivel->id],'style'=>'display:inline']) !!}
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