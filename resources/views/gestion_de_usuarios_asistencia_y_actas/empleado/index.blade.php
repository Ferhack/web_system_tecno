<table class="table table-light">
    <thead class="thead-light">
        <tr> 
            <th>CI</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Contraseña</th>
            <th>Direccion</th> 
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th> 
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($empleado as $empleado) 
            <tr>
                <td>{{ $empleado -> ci}}</td>
                <td>{{ $empleado -> nombre}}</td>
                <td>{{ $empleado -> telefono}}</td>
                <td>{{ $empleado -> email}}</td>
                <td>{{ $empleado -> estado}}</td>
                <td>{{ $empleado -> contrasenia}}</td>
                <td>{{ $empleado -> direccion}}</td>
                {{-- <td>
                    <a href="{{url('/empleado/'.empleado->ci.'/edit')}}">
                        Editar
                    </a>
                </td>  --}}
            </tr>
        @endforeach
    </tbody>
</table>