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
            <div class="card-header">Pies de paguina
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('footer.create') }}">Nuevo Pie de paguina</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>pertenece a</th>
                            <th>conocimineto</th>
                            <th>procedimentales</th>
                            <th>estudiantiles</th>

                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $footer)
                            <tr>
                                <td>{{ $footer->id }}</td>
                                <td>{{ $footer->tipoDocumento_id }}</td>
                                <td>{{ $footer->conocimineto }}</td>
                                <td>{{ $footer->procedimentales }}</td>
                                <td>{{ $footer->estudiantiles }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('footer.show',$footer->id) }}">ver</a>
                                    @can('footer-edit')
                                        <a class="btn btn-primary" href="{{ route('footer.edit',$footer->id) }}">Editar</a>
                                    @endcan
                                    @can('footer-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['footer.destroy', $footer->id],'style'=>'display:inline']) !!}
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