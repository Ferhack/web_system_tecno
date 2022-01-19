<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['asistencia'] =Asistencia::all();
        return view('gestion_de_usuarios_asistencia_y_actas.asistencia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion_de_usuarios_asistencia_y_actas.asistencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asistencia = new Asistencia();
        $asistencia->fecha_actividad = $request->fecha_actividad;
        $asistencia->actividad = $request->actividad; 
        $asistencia->save();


        return redirect('/asistencia')->with('status', 'Asistencia Creado Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $asistencia = Asistencia::findOrFail($id); 
        return view('gestion_de_usuarios_asistencia_y_actas.asistencia.edit',compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosAsistencia = request()->except(['_token','_method']);
        Asistencia::where('id','=',$id)->update($datosAsistencia);
         
        return redirect('/asistencia')->with('status', 'Asistencia Actualizada Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Asistencia::destroy($id);
        return redirect('asistencia');
    }
}
