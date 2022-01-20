<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaSocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AsistenciaSocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $asistencia_socio = DB::table('asistencia_socio')
            ->join('users', 'users.ci', '=', 'asistencia_socio.ci_socio')
            ->where('id_multa', '=', $id)
            ->select('users.nombre', 'users.ci', 'asistencia_socio.id', 'asistencia_socio.id_asistencia')->get();
        // echo $asistencia_socio;
        return view('gestion_de_usuarios_asistencia_y_actas.asistencia_socio.index', [
            'asistencia_socio' => $asistencia_socio,
            'id_asistencia' => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $user_list_socio = User::where('tipo_usuario', '=', 'S')->get();
        // echo $user_list_socio;
        return view('gestion_de_usuarios_asistencia_y_actas.asistencia_socio.create', [
            'user_list_socio' => $user_list_socio,
            'id_asistencia' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $asistencia_socio = new AsistenciaSocio();
        $asistencia_socio->ci_socio = $request->ci_socio;
        $asistencia_socio->id_multa = $id;
        $asistencia_socio->save();
        return redirect('/asistencia_socio/' . $id)->with('status', 'Socio agregado a la asistencia correctamente!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsistenciaSocio  $asistenciaSocio
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, int $idAsistencia)
    {
        AsistenciaSocio::find($id)->delete();
        return redirect('/asistencia_socio/' . $idAsistencia)->with('status', 'Socio eliminado de la asistencia correctamente!');
   
    }
}
