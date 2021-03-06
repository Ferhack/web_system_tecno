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
                <div class="card border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold text-dark">Gestionar Multa</h4>
                        <a class="btn btn-outline-success float-end" href="{{ url('/multa/create') }}">Nueva Multa</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>descripcion</th>
                                        <th>monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multa as $multa)
                                        <tr>
                                            <td>{{ $multa->id }}</td>
                                            <td>{{ $multa->descripcion }}</td>
                                            <td>{{ $multa->monto }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ url('/multa/' . $multa->id . '/edit') }}"
                                                        class="btn btn-warning">
                                                        Editar
                                                    </a>
                                                    <form action="{{ url('/multa/' . $multa->id) . '/delete' }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="submit" value="Eliminar" class="btn btn-danger">
                                                    </form>
                                                    <a href="{{ url('/multa_socio/' . $multa->id) }}" class="btn btn-info">
                                                        Socios Asignados
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php
                        session_start();
                        if (isset($_SESSION['aporte_view_create'])) {
                            $_SESSION['aporte_view_create'] = $_SESSION['aporte_view_create'] + 1;
                        } else {
                            $_SESSION['aporte_view_create'] = 1;
                        }
                        $x = $_SESSION['aporte_view_create'];
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
