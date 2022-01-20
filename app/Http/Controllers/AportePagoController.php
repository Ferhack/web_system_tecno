<?php

namespace App\Http\Controllers;

use App\Models\AportePago;
use App\Models\Pago;
use App\Models\Aporte;
use Illuminate\Http\Request;

class AportePagoController extends Controller
{
    private $aporte_pago;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->aporte_pago = new AportePago();
    }

    /**
     * Display a listing of the resource.
     *  $nro_pago
     * @return \Illuminate\Http\Response
     */
    public function index($nro_pago)
    {
        $pago = Pago::where('nro_pago', $nro_pago)->first();
        $aporte_pagos = $this->aporte_pago->join('aporte', 'aporte.id', '=', 'aporte_pago.id_aporte')
                        ->select('aporte_pago.*', 'aporte.descripcion', 'aporte.monto', 'aporte.porcentaje_mora')
                        ->get();
        return view('gestion_de_pago_de_aportes.pago.aporte_pago.index', ['pago'=>$pago, 'aporte_pagos'=>$aporte_pagos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nro_pago)
    {
        $aportes = Aporte::all();
        return view('gestion_de_pago_de_aportes.pago.aporte_pago.create', ['aportes'=>$aportes, 'nro_pago'=>$nro_pago]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $nro_pago)
    {
        $aporte = Aporte::where('id', $request->id_aporte)->first();
        $now_date = strtotime(date('Y/m/d', time()));
        $fecha_limite = strtotime($aporte->fecha_limite);
        $monto_mora = 0;
        if($now_date > $fecha_limite){
            $monto_mora = ($aporte->monto * $aporte->porcentaje_mora)/100;
        }
        
        $this->aporte_pago->nro_pago = $nro_pago;
        $this->aporte_pago->id_aporte = $request->id_aporte;
        $this->aporte_pago->monto_mora = $monto_mora;
        $this->aporte_pago->save();
        return redirect('/aporte_pago/'.$nro_pago.'');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $nro_pago, int $id_aporte)
    {
        $this->aporte_pago->where('nro_pago', $nro_pago)->where('id_aporte', $id_aporte)->delete();
        return redirect('/aporte_pago/'.$nro_pago.'');
    }
}
