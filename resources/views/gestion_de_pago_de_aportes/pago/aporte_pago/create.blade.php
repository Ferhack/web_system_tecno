@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-4">
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Pagar Aporte</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/aporte_pago/'.$nro_pago.'/create') }}" class="row g-3">
                            @csrf

                            <div class="row mb-3">
                                <label for="id_aporte" class="col-md-2 col-form-label ">Aportes</label>
                                <div class="col-md-10">
                                    <select class="form-select" aria-label="Default select example" name="id_aporte">
                                        @foreach ($aportes as $aporte)
                                            <option value="{{ $aporte->id }}">{{ $aporte->descripcion }} (BS. {{ $aporte->monto }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br />
                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-2">
                                    <a href="{{ url('/aporte_pago/'.$nro_pago.'')}}" class="btn btn-primary">
                                        Volver
                                    </a>
                                    <input type="submit" value="Pagar" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
