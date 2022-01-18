@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-xs|sm|md|lg|xl-1-12">
            <div class="card" style="padding: 30px;">
                <div class="card-header">
                    <h4 class="fw-bold">Registrar Acta de Reunion</h4>
                </div>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('/asistencia')}}">
                        @csrf 
                        <div class="row mb-3">
                            <label for="fecha_reunion" class="col-md-2 col-form-label ">Fecha de Reunion  </label>
                            <div class="col-md-10">
                                <input type="date" name="fecha_reunion" id="fecha_reunion" class = "form-control" required>    
                            </div>
                        </div>
                        <br/>
                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-2 col-form-label ">Descripcion </label>
                            <div class="col-md-10">
                                <input type="text" name="descripcion" id="descripcion" placeholder="La Reunion se realizo con la presencia de........" class = "form-control" required>    
                            </div>
                        </div>
                        <br/>
                        <div class="row mb-3">
                            <label for="tipo_socio" class="col-md-2 col-form-label ">Empleado a Cargo </label>
                            <div class="col-md-10">
                                <select class="form-control" id="tipo_socio" name="tipo_socio" required>
                                    <option value="1">Activo</option> 
                                </select>
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