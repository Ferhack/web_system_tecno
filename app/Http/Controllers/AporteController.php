<?php

namespace App\Http\Controllers;

use App\Models\Aporte;
use Illuminate\Http\Request;

class AporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['aporte'] = Aporte::all();
        return view('gestion_de_pago_de_aportes.aporte.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion_de_pago_de_aportes.aporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: create new aporte
        $aporte = new Aporte();
        $aporte->descripcion = $request->descripcion;
        $aporte->fecha_inicio_pago = $request->fecha_inicio_pago;
        $aporte->monto = $request->monto;
        $aporte->fecha_limite = $request->fecha_limite;
        $aporte->porcentaje_mora = $request->porcentaje_mora;
        $aporte->save();
        return redirect('/aporte')->with('status', 'Aporte Creado Exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aporte  $aporte
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $aporte = Aporte::where('id', $id)->first();
        return view(
            'gestion_de_pago_de_aportes.aporte.edit',
            [
                'id' => $aporte->id,
                'descripcion' => $aporte->descripcion,
                'fecha_inicio_pago' => $aporte->fecha_inicio_pago,
                'monto' => $aporte->monto,
                'fecha_limite' => $aporte->fecha_limite,
                'porcentaje_mora' => $aporte->porcentaje_mora
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aporte  $aporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //TODO: update aporte by ID
        $aporte = Aporte::find($id);
        $aporte->descripcion = $request->descripcion;
        $aporte->fecha_inicio_pago = $request->fecha_inicio_pago;
        $aporte->monto = $request->monto;
        $aporte->fecha_limite = $request->fecha_limite;
        $aporte->porcentaje_mora = $request->porcentaje_mora;
        $aporte->save();
        return redirect('/aporte')->with('status', 'Aporte Actualizado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aporte  $aporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //TODO: remove an aporte
        Aporte::find($id)->delete();
        return redirect('/aporte')->with('status', 'Aporte Eliminado sin problemas!');
    }
}
