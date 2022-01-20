@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Registrar Pago</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/pago') }}" class="row g-3">
                            @csrf
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
                                        value="{{ date('Y-m-d') }}" disabled>
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
                                    <input class="form-control" type="file" id="comprobante" name="comprobante" required>
                                </div>
                                <img src="" style="width: '9rem'; display: 'block';
                                            marginLeft: 'auto';marginRight: 'auto';" />
                            </div>

                            <input type="hidden" name="ci_empleado" value="{{ Auth::user()->ci }}" id="ci_empleado"
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
@endsection
