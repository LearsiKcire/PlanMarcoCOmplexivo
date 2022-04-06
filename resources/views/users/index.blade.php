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
            <div class="card-header">Usuarios
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.create') }}">Nuevo usuario</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Cedula</th>
                            <th>Nivel</th>
                            <th>Empresa</th>
                            <th width="280px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name_f}} {{ $user->name_s }} {{ $user->apellido_f }} {{ $user->apellido_s }}</td>
                                <td>{{ $user->email }}</td>
                                
                            
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $val)
                                            <label class="badge badge-dark">{{ $val }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->cedula }}</td>
                                <td>{{ $user->nivel_id }}</td>
                                <td>{{ $user->empresa_id }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">ver</a>
                                    @can('user-edit')
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                    @endcan
                                    @can('user-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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