<?php

namespace App\Http\Controllers;

use App\Models\MultaPago;
use App\Models\Multa;
use App\Models\Pago;
use Illuminate\Http\Request;

class MultaPagoController extends Controller
{
    private $multa_pago;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->multa_pago = new MultaPago();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nro_pago)
    {
        $pago = Pago::where('nro_pago', $nro_pago)->first();
        $multa_pagos = MultaPago::join('multa', 'multa.id', '=', 'multa_pago.id_multa')
        ->select('multa_pago.*', 'multa.descripcion', 'multa.monto')
        ->get();
        return view('gestion_de_pago_de_aportes.pago.multa_pago.index', ['pago'=>$pago, 'multa_pagos'=>$multa_pagos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nro_pago)
    {
        $pago = Pago::find($nro_pago)->first();
        $multas = Multa::join('multa_socio', 'multa.id', '=', 'multa_socio.id_multa')
        ->where('multa_socio.ci_socio', $pago->ci_socio)
        ->select('multa.*')
        ->get();
        return view('gestion_de_pago_de_aportes.pago.multa_pago.create', ['multas'=>$multas, 'nro_pago'=>$nro_pago]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $nro_pago)
    {
        $this->multa_pago->nro_pago = $nro_pago;
        $this->multa_pago->id_multa = $request->id_multa;
        $this->multa_pago->save();
        return redirect('/multa_pago/'.$nro_pago.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MultaPago  $multaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $nro_pago, int $id_multa)
    {
        $this->multa_pago->where('nro_pago', $nro_pago)->where('id_multa', $id_multa)->delete();
        return redirect('/multa_pago/'.$nro_pago.'');
    }
}
