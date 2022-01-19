<?php

namespace App\Http\Controllers;

use App\Models\ActaReunion;
use Illuminate\Http\Request;

class ActaReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['actaReunion'] = ActaReunion::join('users', 'users.ci', '=', 'acta_reunion.ci_empleado')
            ->select('acta_reunion.*','users.nombre')
            ->get();
        return view('gestion_de_usuarios_asistencia_y_actas.actaReunion.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion_de_usuarios_asistencia_y_actas.actaReunion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acta_reunion = new ActaReunion();
        $acta_reunion->fecha_reunion= $request->fecha_reunion;
        $acta_reunion->descripcion = $request->descripcion;
        $acta_reunion->ci_empleado = $request->ci_empleado;
        $acta_reunion->save();
        return redirect('/actaReunion')->with('status', 'Acta Creada Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActaReunion  $actaReunion
     * @return \Illuminate\Http\Response
     */
    public function show(ActaReunion $actaReunion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActaReunion  $actaReunion
     * @return \Illuminate\Http\Response
     */
    public function edit(int $nro_acta)
    {
        $actaReunion = ActaReunion::findOrFail($nro_acta); 
        return view('gestion_de_usuarios_asistencia_y_actas.actaReunion.edit',compact('actaReunion'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActaReunion  $actaReunion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $nro_acta)
    {
        $actaReunion = request()->except(['_token','_method']);
        ActaReunion::where('nro_acta','=',$nro_acta)->update($actaReunion);
         
        return redirect('/actaReunion')->with('status', 'Acta Actualizada Exitosamente!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActaReunion  $actaReunion
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $nro_acta)
    {
        ActaReunion::destroy($nro_acta);
        return redirect('actaReunion');
    }
}
