<?php

namespace App\Http\Controllers;

use App\Models\MultaPago;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MultaPago  $multaPago
     * @return \Illuminate\Http\Response
     */
    public function show(MultaPago $multaPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MultaPago  $multaPago
     * @return \Illuminate\Http\Response
     */
    public function edit(MultaPago $multaPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MultaPago  $multaPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MultaPago $multaPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MultaPago  $multaPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultaPago $multaPago)
    {
        //
    }
}
