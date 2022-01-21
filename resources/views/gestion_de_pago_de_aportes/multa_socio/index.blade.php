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
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Lista Socios a Multa</h4>
                        <a class="btn btn-outline-success float-end"
                            href="{{ url('/multa_socio/create/' . $id_multa) }}">Asignar
                            Socio</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>CI</th>
                                        <th>Socio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multa_socio as $multa)
                                        <tr>
                                            <td>{{ $multa->id }}</td>
                                            <td>{{ $multa->ci }}</td>
                                            <td>{{ $multa->nombre }}</td>
                                            <td>
                                                <form
                                                    action="{{ url('/multa_socio/' . $multa->id . '/delete/' . $multa->id_multa) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
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
        if (isset($_SESSION['multa_socio_view'])) {
            $_SESSION['multa_socio_view'] = $_SESSION['multa_socio_view'] + 1;
        } else {
            $_SESSION['multa_socio_view'] = 1;
        }
        $x = $_SESSION['multa_socio_view'];
        ?>
    </div>
@endsection
