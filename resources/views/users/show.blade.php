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
            <div class="card-header">Usuario
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Atras</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Nombre:</strong>
                    {{ $user->name_f }} {{ $user->name_s }} {{ $user->apellido_f }} {{ $user->apellido_s }}
                </div>
                <div class="lead">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
                <div class="lead">
                    <strong>contraseña:</strong>
                    ********
                </div>
            </div>
        </div>
    </div>
</div>
@endsection