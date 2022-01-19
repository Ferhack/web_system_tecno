<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use Illuminate\Http\Request;

class MultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: get view principal multa manage
        $datos['multa'] = Multa::all();
        return view('gestion_de_pago_de_aportes.multa.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion_de_pago_de_aportes.multa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: create new multa
        $multa = new Multa();
        $multa->descripcion = $request->descripcion;
        $multa->monto = $request->monto;
        $multa->save();
        return redirect('/multa')->with('status', 'Multa creado exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Multa  $multa
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        // TODO: get info multa
        $multa = Multa::where('id', $id)->first();
        return view(
            'gestion_de_pago_de_aportes.multa.edit',
            [
                'id' => $multa->id,
                'descripcion' => $multa->descripcion,
                'monto' => $multa->monto
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Multa  $multa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //TODO: update multa by ID
        $multa = Multa::find($id);
        $multa->descripcion = $request->descripcion;
        $multa->monto = $request->monto;
        $multa->save();
        return redirect('/multa')->with('status', 'Multa Actualizado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Multa  $multa
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //TODO: remove an aporte
        Multa::find($id)->delete();
        return redirect('/multa')->with('status', 'Multa Eliminado sin problemas!');
    }
}
