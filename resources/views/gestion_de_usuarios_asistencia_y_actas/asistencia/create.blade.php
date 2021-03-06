@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Registrar Actividad de Asistencia</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/asistencia') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="fecha_actividad" class="col-md-2 col-form-label ">Fecha de Actividad </label>
                                <div class="col-md-10">
                                    <input type="date" name="fecha_actividad" id="fecha_actividad" class="form-control"
                                        required>
                                </div>
                            </div>
                            <br />
                            <div class="row mb-3">
                                <label for="actividad" class="col-md-2 col-form-label ">Actividad </label>
                                <div class="col-md-10">
                                    <input type="text" name="actividad" id="actividad"
                                        placeholder="Reunion de inicio de año con informes propuestos......"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="col-md-10 offset-md-2">
                                        <input type="submit" value="Guardar Datos" class="btn btn-success" required>
                                        <a href="{{ url('/asistencia') }}" class="btn btn-primary">
                                            Cancelar
                                        </a>
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
        if (isset($_SESSION['asistencia_view_create'])) {
            $_SESSION['asistencia_view_create'] = $_SESSION['asistencia_view_create'] + 1;
        } else {
            $_SESSION['asistencia_view_create'] = 1;
        }
        $x = $_SESSION['asistencia_view_create'];
        ?>
    </div>
@endsection
