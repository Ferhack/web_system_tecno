@extends('layouts.app')

@section('content')
<div class="container justify-content-center py-4">
    <div class="row">
        <div class="col-xs|sm|md|lg|xl-1-12">
            <div class="card bg-light border border-2" style="padding: 30px;">
                <div class="card-header">
                    <h4 class="fw-bold">Modificar Egreso N° {{$egreso->nro_egreso}}</h4>
                </div>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('/egreso/'.$egreso->nro_egreso) }}" class="row g-3">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row mb-3">
                            <label for="detalle" class="col-md-2 col-form-label ">Detalle </label>
                            <div class="col-md-10">
                                <input type="text" name="detalle" id="detalle" class = "form-control" placeholder="pago de servico basico de luz" required value="{{$egreso->detalle}}">    
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="monto" class = "col-md-2 col-form-label ">Monto </label>
                            <div class="col-md-10">
                                <input type="number" name="monto" class = "form-control" min="1" step="0.1"  placeholder="1500.5" required value="{{$egreso->monto}}">
                            </div>   
                        </div>

                        <div class="row mb-3">
                            <label for="actor_receptor" class="col-md-2 col-form-label ">A Favor de </label>
                            <div class="col-md-10">
                                <input type="text" name="actor_receptor" id="actor_receptor" class = "form-control" placeholder="Empresa CRE" required value="{{$egreso->actor_receptor}}">    
                            </div>
                        </div>
                        <br/>

                        <div class="row mb-0">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="col-md-10 offset-md-2">
                                    <a href="{{ url('/egreso')}}" class="btn btn-primary">
                                        Cancelar
                                    </a>
                                    <input type="submit" value="Guardar Datos" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection