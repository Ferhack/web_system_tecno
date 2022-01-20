@extends('layouts.app')

@section('content')
<div class="container justify-content-center py-4">
    <div class="row">
        <div class="col-xs|sm|md|lg|xl-1-12">
            <div class="card bg-light border border-2" style="padding: 30px;">
                <div class="card-header">
                    <h4 class="fw-bold">Editar Empleado: {{$empleado->ci}}</h4>
                </div>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('/empleado/'.$empleado->ci) }}" class="row g-3">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row mb-3"></div>
                        <div class="row mb-3">
                            <label for="nombre" class="col-md-2 col-form-label ">Nombre</label>
                            <div class="col-md-10">
                                <input type="text" name="nombre" id="nombre" class = "form-control" required value="{{$empleado->nombre}}">    
                            </div>
                        </div> 
                        <br>
                        <div class="row mb-3">
                            <label for="telefono" class = "col-md-2 col-form-label ">Telefono </label>
                            <div class="col-md-10">
                                <input type="tel" pattern="[0-9]{8}" name="telefono" class = "form-control"  required value="{{$empleado->telefono}}">
                            </div>   
                        </div>
                        <br/>
                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label ">Email</label>
                            <div class="col-md-10">
                                <input type="email" name="email" id="email" class = "form-control" required value="{{$empleado->email}}">    
                            </div>
                        </div> 
                        <br>
                        <div class="row mb-3">
                            <label for="direccion" class="col-md-2 col-form-label ">Direccion</label>
                            <div class="col-md-10">
                                <input type="text" name="direccion" id="direccion" class = "form-control" required value="{{$empleado->direccion}}">    
                            </div>
                        </div> 
                        <br/>
                        <div class="row mb-3">
                            <label for="fecha_fin" class="col-md-2 col-form-label ">Fecha Fin</label>
                            <div class="col-md-10">
                                <input type="date" name="fecha_fin" id="fecha_fin" class = "form-control" required value="{{$empleado->fecha_fin}}">    
                            </div>
                        </div> 
                        <div class="row mb-0">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" value="Guardar Datos" class="btn btn-success">
                                    <a href="{{ url('/empleado')}}" class="btn btn-primary">
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
@endsection