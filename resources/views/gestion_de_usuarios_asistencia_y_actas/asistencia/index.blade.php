@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
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
                        <h4 class="fw-bold">Asistencia</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/asistencia/create')}}">Asistencia Nueva</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Actividad</th> 
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencia as $asistencia)
                                        <tr>
                                            <td>{{ $asistencia->id }}</td>
                                            <td>{{ $asistencia->fecha_actividad }}</td>
                                            <td>{{ $asistencia->actividad }}</td> 
                                            <td> 
                                                <a href="{{ url('/asistencia/'.$asistencia->id.'/edit')}}">
                                                    
                                                    Editar
                                                </a>|
                                                <form action="{{ url('/asistencia/'.$asistencia->id )}}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input type="submit" onclick="return confirm('¿Estas Seguro de Eliminarlo?')" 
                                                    value="Borrar">
                                                </form>
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
