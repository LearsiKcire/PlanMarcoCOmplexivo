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
            <div class="card-header">Archivo Pdf
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('pdfs.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Usuario:</strong>
                    {{ $pdf->user_id }}
                    <strong>Nivel:</strong>
                    {{ $pdf->nivel_id }}

                </div>
                <div class="from-group">
                        <embed src="{{ Storage::url($pdf->ruta)}}" type="application/pdf" width="100%" height="600px" />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection