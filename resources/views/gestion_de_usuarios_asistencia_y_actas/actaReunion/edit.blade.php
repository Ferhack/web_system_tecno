@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Editar Acta Nro: {{ $actaReunion->nro_acta }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/actaReunion/' . $actaReunion->nro_acta) }}"
                            class="row g-3">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row mb-3"></div>
                            <div class="row mb-3">
                                <label for="fecha_reunion" class="col-md-2 col-form-label ">Fecha de la Acta </label>
                                <div class="col-md-10">
                                    <input type="date" name="fecha_reunion" id="fecha_reunion" class="form-control" required
                                        value="{{ $actaReunion->fecha_reunion }}">
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <label for="descripcion" class="col-md-2 col-form-label ">Descripcion </label>
                                <div class="col-md-10">
                                    <input type="text" name="descripcion" class="form-control" required
                                        value="{{ $actaReunion->descripcion }}">
                                </div>
                            </div>

                            <br />

                            <div class="row mb-0">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="col-md-10 offset-md-2">
                                        <input type="submit" value="Guardar Datos" class="btn btn-success">
                                        <a href="{{ url('/actaReunion') }}" class="btn btn-primary">
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
        if (isset($_SESSION['acta_reunion_view_edit'])) {
            $_SESSION['acta_reunion_view_edit'] = $_SESSION['acta_reunion_view_edit'] + 1;
        } else {
            $_SESSION['acta_reunion_view_edit'] = 1;
        }
        $x = $_SESSION['acta_reunion_view_edit'];
        ?>
    </div>
@endsection
