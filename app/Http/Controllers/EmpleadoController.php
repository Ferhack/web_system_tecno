<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleado'] =User::paginate(5);
        return view('gestion_de_usuarios_asistencia_y_actas.empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('gestion_de_usuarios_asistencia_y_actas.empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // if (!$request->ajax()) return redirect('/');

        // $users = new User();
        // $users->ci = $request->ci;
        // $users->nombre = $request->nombre;
        // $users->telefono = $request->telefono;
        // $users->email = $request->email;
        // $users->estado = $request->estado;
        // $users->contrasenia = $request->contrasenia;
        // $users->direccion = $request->direccion;
        // $users->tipo_usuario = $request->tipo_usuario;
        // $users->save();

        // if (!$request->ajax()) return redirect('/');
        // $empleado = new Empleado();
        // $empleado->ci = $request->ci;
        // $empleado->fecha_inicio = $request->fecha_inicio;
        // $empleado->fecha_fin = $request->fecha_fin; 
        // $empleado->save();

        $datosUsuario = request()->except('_token', 'fecha_inicio', 'fecha_fin');
        User::insert($datosUsuario);
        $datosEmpleado = request()->except('_token', 'nombre','telefono','email','estado','contrasenia', 'direccion', 'tipo_usuario');
        Empleado::insert($datosEmpleado);
        // //echo ($request) ;
        // // dump($request);
        // // die();
        // //var_dump($request); 
       return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //$empleado=Empleado::findOrFail($ci);
        return view('gestion_de_usuarios_asistencia_y_actas.empleado.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        return view('gestion_de_usuarios_asistencia_y_actas.empleado.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
