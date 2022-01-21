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
                        <h4 class="fw-bold text-dark">Lista de Asistencia de socios</h4>
                        <a class="btn btn-outline-success float-end"
                            href="{{ url('/asistencia_socio/create/' . $id_asistencia) }}">Añadir Socio
                        </a>
                        <a href="{{ url('/asistencia') }}" class="btn btn-primary">
                            Volver
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Socio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencia_socio as $asistencia_socio)
                                        <tr>
                                            <td>{{ $asistencia_socio->id }}</td>
                                            <td>{{ $asistencia_socio->ci }}</td>
                                            <td>{{ $asistencia_socio->nombre }}</td>
                                            <td>
                                                <form
                                                    action="{{ url('/asistencia_socio/' . $asistencia_socio->id . '/delete/' . $asistencia_socio->id_asistencia) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="submit"
                                                        onclick="return confirm('¿Estas Seguro de Eliminarlo?')"
                                                        value="Borrar" class="btn btn-danger">
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
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['asistencia_socio_view'])) {
            $_SESSION['asistencia_socio_view'] = $_SESSION['asistencia_socio_view'] + 1;
        } else {
            $_SESSION['asistencia_socio_view'] = 1;
        }
        $x = $_SESSION['asistencia_socio_view'];
        ?>
    </div>
@endsection
