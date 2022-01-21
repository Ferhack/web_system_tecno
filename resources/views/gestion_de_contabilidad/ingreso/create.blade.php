@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Registrar Ingreso</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/ingreso') }}" class="row g-3">
                            @csrf
                            <div class="row mb-3">
                                <label for="detalle" class="col-md-2 col-form-label ">Detalle </label>
                                <div class="col-md-10">
                                    <input type="text" name="detalle" id="detalle" class="form-control"
                                        placeholder="ingreso en efectivo por el servicio de baño publico" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="monto" class="col-md-2 col-form-label ">Monto </label>
                                <div class="col-md-10">
                                    <input type="number" name="monto" class="form-control" min="1" step="0.1"
                                        placeholder="1500.5" required>
                                </div>
                            </div>

                            <input type="hidden" name="ci_empleado" value="{{ Auth::user()->ci }}" id="tipo_usuario"
                                class="form-control">

                            <br />
                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" value="Guardar Datos" class="btn btn-success">
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
        if (isset($_SESSION['ingreso_view_create'])) {
            $_SESSION['ingreso_view_create'] = $_SESSION['ingreso_view_create'] + 1;
        } else {
            $_SESSION['ingreso_view_create'] = 1;
        }
        $x = $_SESSION['ingreso_view_create'];
        ?>
    </div>
@endsection
