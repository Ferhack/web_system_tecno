<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // middleware to protected the routes
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleado'] =Empleado::all(); 
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
        $users = new User();
        $users->ci = $request->ci;
        $users->nombre = $request->nombre;
        $users->telefono = $request->telefono;
        $users->email = $request->email;
        $users->estado = '1';
        $users->password = Hash::make($request->password);
        $users->direccion = $request->direccion;
        $users->tipo_usuario = 'E';
        $users->save();

        $empleado = new Empleado();
        $empleado->ci = $request->ci;
        $empleado->fecha_inicio = $request->fecha_inicio;
        $empleado->fecha_fin = $request->fecha_fin; 
        $empleado->save();

        return redirect('/empleado')->with('status', 'Empleado Creado Exitosamente!');
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
    public function destroy($ci)
    {
        Empleado::destroy($ci);
        User::destroy($ci);
        return redirect('empleado');
    }
}
