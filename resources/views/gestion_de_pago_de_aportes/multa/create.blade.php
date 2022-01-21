@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Registrar Multa</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/multa') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="descripcion" class="col-md-2 col-form-label ">Descripcion </label>
                                <div class="col-md-10">
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="monto" class="col-md-2 col-form-label ">monto </label>
                                <div class="col-md-10">
                                    <input type="number" name="monto" id="monto" class="form-control" required>
                                </div>
                            </div>

                            <br />
                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" value="Guardar Datos" class="btn btn-success" required>
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
        if (isset($_SESSION['multa_view_create'])) {
            $_SESSION['multa_view_create'] = $_SESSION['multa_view_create'] + 1;
        } else {
            $_SESSION['multa_view_create'] = 1;
        }
        $x = $_SESSION['multa_view_create'];
        ?>
    </div>
@endsection
