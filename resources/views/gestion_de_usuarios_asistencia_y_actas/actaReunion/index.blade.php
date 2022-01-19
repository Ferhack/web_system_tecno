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
                        <h4 class="fw-bold text-dark">Acta de Reunion</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/actaReunion/create')}}">Acta de Reunion Nueva</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>N° Acta</th>
                                        <th>Fecha de Reunion</th>
                                        <th>Descripcion</th> 
                                        <th>Empleado</th> 
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actaReunion as $actaReunion)
                                        <tr>
                                            <td>{{ $actaReunion->nro_acta }}</td>
                                            <td>{{ $actaReunion->fecha_reunion }}</td>
                                            <td>{{ $actaReunion->descripcion }}</td> 
                                            <td>{{ $actaReunion->nombre }}</td> 
                                            <td> 
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/actaReunion/'.$actaReunion->nro_acta.'/edit')}}" class="btn btn-warning">
                                                        Editar
                                                    </a>
                                                    <form action="{{ url('/actaReunion/'.$actaReunion->nro_acta )}}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit" onclick="return confirm('¿Estas Seguro de Eliminarlo?')" 
                                                        value="Borrar" class="btn btn-danger">
                                                    </form> 
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