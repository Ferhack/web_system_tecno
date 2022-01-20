@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Asignar Socio a Multa</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/multa_socio/create/' . $id_multa) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="socio_assign" class="col-md-2 col-form-label ">Socio a agregar </label>
                                <div class="col-md-10">
                                    <select class="form-control" id="socio_assign" name="ci_socio">
                                        @foreach ($user_list_socio as $user)
                                            <option value="{{ $user->ci }}">{{ $user->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br />
                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <input type="submit" value="Guardar Asignación" class="btn btn-success" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
