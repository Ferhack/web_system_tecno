@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Aporte</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/aporte/create') }}">Aporte Nuevo</a>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>descripcion</th>
                                        <th>fecha_inicio_pago</th>
                                        <th>monto</th>
                                        <th>fecha_limite</th>
                                        <th>porcentaje_mora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aporte as $aporte)
                                        <tr>
                                            <td>{{ $aporte->id }}</td>
                                            <td>{{ $aporte->descripcion }}</td>
                                            <td>{{ $aporte->fecha_inicio_pago }}</td>
                                            <td>{{ $aporte->monto }}</td>
                                            <td>{{ $aporte->fecha_limite }}</td>
                                            <td>{{ $aporte->porcentaje_mora }}</td>
                                            <td>
                                                <a href="{{ url('/aporte/' . $aporte->id . '/edit') }}"
                                                    class="btn btn-warning">
                                                    Editar
                                                </a>
                                                <form action="{{ url('/aporte/' . $aporte->id) . '/delete' }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
