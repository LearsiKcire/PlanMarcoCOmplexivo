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
            <div class="card-header">Pdfs
                @can('pdf-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('pdfs.create') }}">Nuevo PDF</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Persona</th>
                            <th>Nivel</th>
                            <th>Archivo</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $pdf)
                            <tr>
                                <td>{{ $pdf->id }}</td>
                                <td>{{ $pdf->user_id }}</td>
                                <td>{{ $pdf->nivel_id }}</td>
                                <td>{{ $pdf->ruta }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('pdfs.show',$pdf->id) }}">ver</a>
                                    @can('pdf-edit')
                                        <a class="btn btn-primary" href="{{ route('pdfs.edit',$pdf->id) }}">Edit</a>
                                    @endcan
                                    @can('pdf-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['pdfs.destroy', $pdf->id],'style'=>'display:inline']) !!}
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