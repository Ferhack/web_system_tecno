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
                        Pago N° {{$pago->nro_pago}} <br/>
                        Socio {{$pago->ci_socio }}<br/>  
                        Total <b>{{$pago->monto_total}}</b> <br/>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Multas del Pago N° {{$pago->nro_pago}}</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/multa_pago/'.$pago->nro_pago.'/create')}}">Pagar Multas</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Multa</th>
                                        <th>Monto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multa_pagos as $multa_pago)
                                        <tr>
                                            <td>{{ $multa_pago->id_multa }}</td>
                                            <td>{{ $multa_pago->descripcion }}</td>
                                            <td>{{ $multa_pago->monto }}</td>
                                            <td> 
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <form action="{{ url('/multa_pago/'.$pago->nro_pago.'/'.$multa_pago->id_multa )}}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit" onclick="return confirm('¿Estas Seguro de Eliminarlo?')" 
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
        if (isset($_SESSION['multa_pago_view'])) {
            $_SESSION['multa_pago_view'] = $_SESSION['multa_pago_view'] + 1;
        } else {
            $_SESSION['multa_pago_view'] = 1;
        }
        $x = $_SESSION['multa_pago_view'];
        ?>
    </div>
@endsection