@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Editar Aporte</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/aporte/' . $id . '/update') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="descripcion" class="col-md-2 col-form-label ">Descripcion </label>
                                <div class="col-md-10">
                                    <input type="text" name="descripcion" id="descripcion" class="form-control"
                                        value="{{ $descripcion }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fecha_inicio_pago" class="col-md-2 col-form-label ">Fecha Inicio de Pago
                                </label>
                                <div class="col-md-10">
                                    <input type="date" name="fecha_inicio_pago" id="fecha_inicio_pago" class="form-control"
                                        value="{{ $fecha_inicio_pago }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="monto" class="col-md-2 col-form-label ">monto </label>
                                <div class="col-md-10">
                                    <input type="number" name="monto" id="monto" class="form-control"
                                        value="{{ $monto }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fecha_limite" class="col-md-2 col-form-label ">Fecha Limite </label>
                                <div class="col-md-10">
                                    <input type="date" name="fecha_limite" id="fecha_limite" class="form-control"
                                        value="{{ $fecha_limite }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="porcentaje_mora" class="col-md-2 col-form-label ">Porcentaje Mora </label>
                                <div class="col-md-10">
                                    <input type="number" name="porcentaje_mora" id="porcentaje_mora" class="form-control"
                                        value="{{ $porcentaje_mora }}" required>
                                </div>
                            </div>
                            <br />
                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" value="Confirmar Cambios" class="btn btn-success" required>
                                    <a type="button" href="{{ url('/aporte') }}" class="btn btn-danger">Cancelar
                                        Cambios</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
