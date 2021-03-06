@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Modificar Pago N° {{ $pago->nro_pago }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/pago/' . $pago->nro_pago) }}" class="row g-3">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="row mb-3">
                                <label for="empleado" class="col-md-2 col-form-label ">Empleado</label>
                                <div class="col-md-10">
                                    <input type="text" name="empleado" id="empleado" class="form-control"
                                        value="{{ Auth::user()->nombre }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fecha_pago" class="col-md-2 col-form-label ">Fecha</label>
                                <div class="col-md-10">
                                    <input type="date" name="fecha_pago" id="fecha_pago" class="form-control"
                                        value="{{ $pago->fecha_pago }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ci_socio" class="col-md-2 col-form-label ">Socio</label>
                                <div class="col-md-10">
                                    <select class="form-select" aria-label="Default select example" name="ci_socio">
                                        @foreach ($socios as $socio)
                                            <option value="{{ $socio->ci }}">{{ $socio->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="comprobante" class="col-md-2 col-form-label ">Comprobante</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="comprobante" name="comprobante"
                                        value="{{ $pago->comprobante }}"
                                        placeholder="Nro de comprobante por el deposito realizado en el banco" required>
                                </div>
                            </div>

                            <br />

                            <div class="row mb-0">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="col-md-10 offset-md-2">
                                        <a href="{{ url('/pago') }}" class="btn btn-primary">
                                            Cancelar
                                        </a>
                                        <input type="submit" value="Guardar Datos" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['pago_multa_pago_edit_view'])) {
            $_SESSION['pago_multa_pago_edit_view'] = $_SESSION['pago_multa_pago_edit_view'] + 1;
        } else {
            $_SESSION['pago_multa_pago_edit_view'] = 1;
        }
        $x = $_SESSION['pago_multa_pago_edit_view'];
        ?>
    </div>
@endsection
