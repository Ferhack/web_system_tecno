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
                <div class="card bg-light" style="padding: 30px;">
                    <div class="card-body">
                        Pago N° {{ $pago->nro_pago }} <br />
                        Socio {{ $pago->ci_socio }}<br />
                        Total <b>{{ $pago->monto_total }}</b> <br />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Aportes del Pago N° {{ $pago->nro_pago }}</h4>
                        <a class="btn btn-outline-success float-end"
                            href="{{ url('/aporte_pago/' . $pago->nro_pago . '/create') }}">Pagar Aportes</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aporte</th>
                                        <th>Monto</th>
                                        <th>% Mora</th>
                                        <th>Mora</th>
                                        <th>Subtotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aporte_pagos as $aporte_pago)
                                        <tr>
                                            <td>{{ $aporte_pago->id_aporte }}</td>
                                            <td>{{ $aporte_pago->descripcion }}</td>
                                            <td>{{ $aporte_pago->monto }}</td>
                                            <td>{{ $aporte_pago->porcentaje_mora }}</td>
                                            <td>{{ $aporte_pago->monto_mora }}</td>
                                            <td>{{ $aporte_pago->monto + $aporte_pago->monto_mora }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form
                                                        action="{{ url('/aporte_pago/' . $pago->nro_pago . '/' . $aporte_pago->id_aporte . '') }}"
                                                        method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit"
                                                            onclick="return confirm('¿Estas Seguro de Eliminarlo?')"
                                                            value="X" class="btn btn-danger">
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
        if (isset($_SESSION['pago_aporte_pago_view'])) {
            $_SESSION['pago_aporte_pago_view'] = $_SESSION['pago_aporte_pago_view'] + 1;
        } else {
            $_SESSION['pago_aporte_pago_view'] = 1;
        }
        $x = $_SESSION['pago_aporte_pago_view'];
        ?>
    </div>
@endsection
