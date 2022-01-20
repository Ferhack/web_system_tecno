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
            </div><footer id="footer" class="site-footer dark-skin dark-widgetized-area">
                        
                <?php
    session_start();
    if (isset($_SESSION['reporte_ingreso_view'])) {
        $_SESSION['reporte_ingreso_view'] = $_SESSION['reporte_ingreso_view'] + 1;
    } else {
        $_SESSION['reporte_ingreso_view'] = 1;
    }
    ?>

    <p>Cantidad de Vistas: <?php echo $_SESSION['reporte_ingreso_view']; ?></p>
                <div id="site-info" class="site-info site-info-layout-2">
                    <div class="container">
                        <div class="tie-row">
                            <div class="tie-col-md-12">
                                <div class="copyright-text copyright-text-first">© Copyright 2021, Todos los derechos reservados </div></li>
                                    <li id="menu-item-1239"><a href="mailto:grupo14sc@tecnoweb.org.bo">Contáctanos con un correo</a></li> 
                                </ul></div>
                            </div>
                        </div>
                    </div>
            </footer>
        </div>
    </div>
    
@endsection