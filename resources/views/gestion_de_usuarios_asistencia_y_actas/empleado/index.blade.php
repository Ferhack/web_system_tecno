@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Empleados</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/empleado/create')}}">Empleado Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-light">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Direccion</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleado as $empleado)
                                        <tr>
                                            <td>{{ $empleado->ci }}</td>
                                            <td>{{ $empleado->nombre }}</td>
                                            <td>{{ $empleado->telefono }}</td>
                                            <td>{{ $empleado->email }}</td>
                                            <td>
                                                @if($empleado->estado =='1')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/empleado/'.$empleado->ci.'/desactivar') }}" class="btn btn-success">
                                                        Habilitado
                                                    </a> 
                                                </div>
                                                @else
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/empleado/'.$empleado->ci.'/activar')}}" class="btn btn-default">
                                                        Deshabilitado
                                                    </a> 
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ $empleado->direccion }}</td>
                                            <td>{{ $empleado->fecha_inicio }}</td>
                                            <td>{{ $empleado->fecha_fin }}</td>
                                            <td> 
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/empleado/'.$empleado->ci.'/edit')}}" class="btn btn-warning">
                                                        Editar
                                                    </a> 
                                                </div>
                                            </td>  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
