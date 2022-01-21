@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <b>{{ session('status') }}</b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Ingresos</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/ingreso/create') }}">Ingreso Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Detalle</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                        <th>Empleado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ingresos as $ingreso)
                                        <tr>
                                            <td>{{ $ingreso->nro_ingreso }}</td>
                                            <td>{{ $ingreso->detalle }}</td>
                                            <td>{{ $ingreso->fecha_ingreso }}</td>
                                            <td>{{ $ingreso->monto }}</td>
                                            <td>{{ $ingreso->nombre }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/ingreso/' . $ingreso->nro_ingreso . '/edit') }}"
                                                        class="btn btn-warning">
                                                        Editar
                                                    </a>
                                                    <form action="{{ url('/ingreso/' . $ingreso->nro_ingreso) }}"
                                                        method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit"
                                                            onclick="return confirm('¿Estas Seguro de Eliminarlo?')"
                                                            value="Borrar" class="btn btn-danger">
                                                    </form>
                                                </div>
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
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['ingreso_view'])) {
            $_SESSION['ingreso_view'] = $_SESSION['ingreso_view'] + 1;
        } else {
            $_SESSION['ingreso_view'] = 1;
        }
        $x = $_SESSION['ingreso_view'];
        ?>
    </div>
@endsection
