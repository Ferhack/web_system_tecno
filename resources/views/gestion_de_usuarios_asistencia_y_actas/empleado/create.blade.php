@extends('layouts.app')

@section('content')

<form action="{{ url('/empleado')}}" method="post">
    @csrf
    <label for="ci">CI </label>
    <input type="text" name="ci">
    <br>

    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" id="nombre">
    <br>

    <label for="telefono">Telefono  </label>
    <input type="text" name="telefono" id="telefono">
    <br>

    <label for="email">Email  </label>
    <input type="text" name="email" id="email">
    <br>

    <label for="estado">Estado  </label>
    <input type="text" name="estado" id="estado">
    <br>

    <label for="contrasenia">Contraseña  </label>
    <input type="text" name="contrasenia" id="contrasenia" >
    <br>
    
    <label for="direccion">Direccion  </label>
    <input type="text" name="direccion" id="direccion">
    <br>

    <label for="tipo_usuario">Tipo Usuario  </label>
    <input type="text" name="tipo_usuario" id="tipo_usuario" >
    <br>

    <label for="fecha_inicio">Fecha Inicio  </label>
    <input type="text" name="fecha_inicio" id="fecha_inicio">
    <br>

    <label for="fecha_fin">Fecha Fin  </label>
    <input type="text" name="fecha_fin" id="fecha_fin">
    <br>

    <input type="submit" value="Guardar Datos">
</form> 
@endsection