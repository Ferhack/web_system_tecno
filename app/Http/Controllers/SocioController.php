<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Socio;
use Illuminate\Http\Request;
use App\Models\User;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['socio'] = Socio::join('users', 'users.ci', '=', 'socio.ci')
        ->select('socio.*','users.nombre','users.telefono','users.email','users.estado','users.direccion')
        ->get();
        return view('gestion_de_usuarios_asistencia_y_actas.socio.index', $datos);
   
    //     $datos['socio'] =Socio::all();
    //    return view('gestion_de_usuarios_asistencia_y_actas.socio.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion_de_usuarios_asistencia_y_actas.socio.create');
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
        $users->tipo_usuario = 'S';
        $users->save();

        $socio = new Socio();
        $socio->ci = $request->ci;
        $socio->fecha_afiliacion = $request->fecha_afiliacion;
        $socio->nro_puesto = $request->nro_puesto; 
        $socio->tipo_socio = $request->tipo_socio;
        $socio->fecha_inicio = $request->fecha_inicio; 
        $socio->save();

        return redirect('/socio')->with('status', 'Socio Creado Exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(int $ci)
    {
        $socio=User::findOrFail($ci);
        return view('gestion_de_usuarios_asistencia_y_actas.socio.edit',compact('socio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $ci)
    {
        $users = User::find($ci);
        $users->nombre = $request->nombre;
        $users->telefono = $request->telefono;
        $users->email = $request->email;
        $users->direccion = $request->direccion;
        $users->tipo_usuario = 'S';
        $users->save();
        $socio = Socio::find($ci);
        $socio->nro_puesto = $request->nro_puesto; 
        $socio->fecha_inicio = $request->fecha_inicio; 
        $socio->save();
        return redirect('/socio')->with('status', 'Socio Actualizado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy($ci)
    {
        Socio::destroy($ci);
        User::destroy($ci);
        return redirect('socio');
    }
}
