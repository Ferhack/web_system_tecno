<?php

namespace App\Http\Controllers;

use App\Models\MultaSocio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultaSocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $multa_socio = DB::table('multa_socio')
            ->join('users', 'users.ci', '=', 'multa_socio.ci_socio')
            ->where('id_multa', '=', $id)
            ->select('users.nombre', 'users.ci', 'multa_socio.id', 'multa_socio.id_multa')->get();
        // echo $multa_socio;
        return view('gestion_de_pago_de_aportes.multa_socio.index', [
            'multa_socio' => $multa_socio,
            'id_multa' => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        // TODO: rendering assign socio into multa
        $user_list_socio = User::where('tipo_usuario', '=', 'S')->get();
        // echo $user_list_socio;
        return view('gestion_de_pago_de_aportes.multa_socio.create', [
            'user_list_socio' => $user_list_socio,
            'id_multa' => $id
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
        // TODO: assign socio into multa
        $multaSocio = new MultaSocio();
        $multaSocio->ci_socio = $request->ci_socio;
        $multaSocio->id_multa = $id;
        $multaSocio->save();
        return redirect('/multa_socio/' . $id)->with('status', 'Socio agregado a la multa correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MultaPago  $multaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, int $idMulta)
    {
        //TODO: remove an aporte
        MultaSocio::find($id)->delete();
        return redirect('/multa_socio/' . $idMulta)->with('status', 'Socio eliminado de la multa correctamente!');
    }
}
