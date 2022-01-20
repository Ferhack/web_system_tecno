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
                        <h4 class="fw-bold text-dark">Socios</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/socio/create')}}">Socio Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Direccion</th>
                                        <th>Fecha Afiliacion</th>
                                        <th>Puesto</th>
                                        <th>Tipo Socio</th>
                                        <th>Fecha Inicio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($socio as $socio)
                                        <tr>
                                            <td>{{ $socio->ci }}</td>
                                            <td>{{ $socio->nombre }}</td>
                                            <td>{{ $socio->telefono }}</td>
                                            <td>{{ $socio->email }}</td>
                                            <td>{{ $socio->estado }}</td>
                                            <td>{{ $socio->direccion }}</td>
                                            <td>{{ $socio->fecha_afiliacion }}</td>
                                            <td>{{ $socio->nro_puesto }}</td>
                                            <td>{{ $socio->tipo_socio }}</td>
                                            <td>{{ $socio->fecha_inicio }}</td>
                                            <td> 
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/socio/'.$socio->ci.'/edit')}}" class="btn btn-warning">
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
