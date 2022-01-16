@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-xs|sm|md|lg|xl-1-12">
            <div class="card" style="padding: 30px;">
                <div class="card-header">
                    <h4 class="fw-bold">Registrar Empleado</h4>
                </div>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('/empleado')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="ci" class = "col-md-2 col-form-label ">CI </label>
                            <div class="col-md-10">
                                <input type="number" name="ci" class = "form-control" min="1" step="1"  required>
                            </div>   
                        </div>
            
                        <div class="row mb-3">
                            <label for="nombre" class="col-md-2 col-form-label ">Nombre </label>
                            <div class="col-md-10">
                                <input type="text" name="nombre" id="nombre" class = "form-control" required>    
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="telefono" class="col-md-2 col-form-label ">Telefono  </label>
                            <div class="col-md-10">
                                <input type="tel" pattern="[0-9]{8}" name="telefono" id="telefono" class = "form-control" required>
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label ">Email  </label>
                            <div class="col-md-10">
                                <input type="email" name="email" id="email" class = "form-control" required>
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="contrasenia" class="col-md-2 col-form-label ">Contraseña  </label>
                            <div class="col-md-10">
                                <input type="password" name="contrasenia" id="contrasenia" class = "form-control" required>
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="direccion" class="col-md-2 col-form-label ">Direccion  </label>
                            <div class="col-md-10">
                                <input type="text" name="direccion" id="direccion" class = "form-control" required>
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="fecha_inicio" class="col-md-2 col-form-label ">Fecha Inicio  </label>
                            <div class="col-md-10">
                                <input type="date" name="fecha_inicio" id="fecha_inicio" class = "form-control" required>    
                            </div>
                        </div>
            
                        <div class="row mb-3">
                            <label for="fecha_fin" class="col-md-2 col-form-label ">Fecha Fin  </label>
                            <div class="col-md-10">
                                <input type="date" name="fecha_fin" id="fecha_fin" class = "form-control" required>    
                            </div>
                        </div>
                        <br/>
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