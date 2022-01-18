@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col-xs|sm|md|lg|xl-1-12">
            <div class="card" style="padding: 30px;">
                <div class="card-header">
                    <h4 class="fw-bold">Editar Asistencia</h4>
                </div>
            
                <div class="card-body">
                    <form action="{{ url('/asistencia')}}" _method="post">
                        @csrf
                         {{ method_field('PATCH') }} 
                        <label for="fecha_actividad">Fecha de la Actividad </label>
                        <input type="date" name="fecha_actividad" value ="{{$asistencia->fecha_actividad}}" id="fecha_actividad">
                        <br>
                    
                        <label for="actividad">Actividad  </label>
                        <input type="text" name="actividad" value ="{{$asistencia->actividad}}" id="actividad">
                        <br>
                    
                        <input type="submit" value="Guardar Datos" class="btn btn-success" required> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection