@extends('layouts.app')

@section('content')
    <div class="container justify-content-center ">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light" style="padding: 30px;">
                    <div class="card-body">
                        Socio {{ $socio->nombre }}<br />
                        CI {{ $socio->ci }} <br />
                        Telefono {{ $socio->telefono }} <br />
                        Nro Puesto <b>{{ $socio->nro_puesto }}</b> <br />
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Pagos Realizados </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light caption-top">
                                <caption class="text-center">
                                    <h4>Aportes</h4>
                                </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aporte</th>
                                        <th>Limite</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                        <th>% Mora</th>
                                        <th>Mora</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aporte_pagados as $aporte_pago)
                                        <tr>
                                            <td>{{ $aporte_pago->nro_pago }}</td>
                                            <td>{{ $aporte_pago->descripcion }}</td>
                                            <td>{{ $aporte_pago->fecha_limite }}</td>
                                            <td>{{ $aporte_pago->fecha_pago }}</td>
                                            <td>{{ $aporte_pago->monto }}</td>
                                            <td>{{ $aporte_pago->porcentaje_mora }}</td>
                                            <td>{{ $aporte_pago->monto_mora }}</td>
                                            <td>{{ $aporte_pago->monto + $aporte_pago->monto_mora }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light caption-top">
                                <caption class="text-center">
                                    <h4>Multas</h4>
                                </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Multa</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multa_pagados as $multa_pago)
                                        <tr>
                                            <td>{{ $multa_pago->nro_pago }}</td>
                                            <td>{{ $multa_pago->descripcion }}</td>
                                            <td>{{ $multa_pago->monto }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Deudas </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light caption-top">
                                <caption class="text-center">
                                    <h4>Aportes</h4>
                                </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aporte</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                        <th>Monto</th>
                                        <th>% Mora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aporte_no_pagados as $aporte_no_pago)
                                        <tr>
                                            <td>{{ $aporte_no_pago->id }}</td>
                                            <td>{{ $aporte_no_pago->descripcion }}</td>
                                            <td>{{ $aporte_no_pago->fecha_inicio_pago }}</td>
                                            <td>{{ $aporte_no_pago->fecha_limite }}</td>
                                            <td>{{ $aporte_no_pago->monto }}</td>
                                            <td>{{ $aporte_no_pago->porcentaje_mora }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light caption-top">
                                <caption class="text-center">
                                    <h4>Multas</h4>
                                </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Multa</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multa_no_pagados as $multa_no_pago)
                                        <tr>
                                            <td>{{ $multa_no_pago->id }}</td>
                                            <td>{{ $multa_no_pago->descripcion }}</td>
                                            <td>{{ $multa_no_pago->monto }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['kardex_view'])) {
            $_SESSION['kardex_view'] = $_SESSION['kardex_view'] + 1;
        } else {
            $_SESSION['kardex_view'] = 1;
        }
        $x = $_SESSION['kardex_view'];
        ?>
    </div>
@endsection
