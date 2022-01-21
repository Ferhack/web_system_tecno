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
                        <h4 class="fw-bold text-dark">Pagos</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/pago/create') }}">Pago Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Comprobante</th>
                                        <th>Socio</th>
                                        <th>Empleado</th>
                                        <th>Monto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pagos as $pago)
                                        <tr>
                                            <td>{{ $pago->nro_pago }}</td>
                                            <td>{{ $pago->fecha_pago }}</td>
                                            <td>{{ $pago->comprobante }}</td>
                                            <td>{{ $pago->socio }}</td>
                                            <td>{{ $pago->empleado }}</td>
                                            <td>{{ $pago->monto_total }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/pago/' . $pago->nro_pago . '/edit') }}"
                                                        class="btn btn-warning">
                                                        Editar
                                                    </a>
                                                    <form action="{{ url('/pago/' . $pago->nro_pago) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit"
                                                            onclick="return confirm('¿Estas Seguro de Eliminarlo?')"
                                                            value="Borrar" class="btn btn-danger">
                                                    </form>
                                                    <a href="{{ url('/aporte_pago/' . $pago->nro_pago . '') }}"
                                                        class="btn btn-secondary">
                                                        Aportes
                                                    </a>
                                                    <a href="{{ url('/multa_pago/' . $pago->nro_pago . '') }}"
                                                        class="btn btn-secondary">
                                                        Multas
                                                    </a>
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
        if (isset($_SESSION['pago_view'])) {
            $_SESSION['pago_view'] = $_SESSION['pago_view'] + 1;
        } else {
            $_SESSION['pago_view'] = 1;
        }
        $x = $_SESSION['pago_view'];
        ?>
    </div>
@endsection
