@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-xs|sm|md|lg|xl-1-12">
            <div class="card" style="padding: 30px;">
                <div class="card-header">
                    <h4 class="fw-bold">Registrar Actividad de Asistencia</h4>
                </div>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('/asistencia')}}">
                        @csrf 
                        <div class="row mb-3">
                            <label for="fecha_actividad" class="col-md-2 col-form-label ">Fecha de Actividad  </label>
                            <div class="col-md-10">
                                <input type="date" name="fecha_actividad" id="fecha_actividad" class = "form-control" required>    
                            </div>
                        </div>
                        <br/>
                        <div class="row mb-3">
                            <label for="actividad" class="col-md-2 col-form-label ">Actividad </label>
                            <div class="col-md-10">
                                <input type="text" name="actividad" id="actividad" placeholder="Reunion de inicio de año con informes propuestos......" class = "form-control" required>    
                            </div>
                        </div>
            
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
@endsection