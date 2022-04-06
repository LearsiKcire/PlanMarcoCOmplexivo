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
                        <a class="btn btn-primary" href="{{ route('empresas.index') }}">Back</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Empresa:</strong>
                    {{ $empresa->nombre }}
                </div>
                <div class="lead">
                    <strong>Gerente:</strong>
                    {{ $empresa->gerente }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection