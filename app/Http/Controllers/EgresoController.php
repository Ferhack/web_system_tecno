<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use Illuminate\Http\Request;

class EgresoController extends Controller
{
    private $egreso;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->egreso = new Egreso();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['egresos'] = $this->egreso->join('users', 'users.ci', '=', 'egreso.ci_empleado')
            ->select('egreso.*','users.nombre')
            ->orderBy('egreso.fecha_egreso', 'desc')
            ->get();
        return view('gestion_de_contabilidad.egreso.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestion_de_contabilidad.egreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->egreso->detalle = $request->detalle;
        $this->egreso->fecha_egreso = date('d/m/Y');
        $this->egreso->monto = $request->monto;
        $this->egreso->actor_receptor = $request->actor_receptor;
        $this->egreso->ci_empleado = $request->ci_empleado;
        $this->egreso->save();
        return redirect('/egreso')->with('status', 'Egreso CREADO Exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $nro_egreso
     * @return \Illuminate\Http\Response
     */
    public function edit($nro_egreso)
    {
        $data['egreso'] = $this->egreso->where('nro_egreso', $nro_egreso)->first();
        return view('gestion_de_contabilidad.egreso.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $nro_egreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nro_egreso)
    {
        $this->egreso = $this->egreso->find($nro_egreso);
        $this->egreso->detalle = $request->detalle;
        $this->egreso->monto = $request->monto;
        $this->egreso->actor_receptor = $request->actor_receptor;
        $this->egreso->save();
        return redirect('/egreso')->with('status', 'Egreso MODIFICADO Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $nro_egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($nro_egreso)
    {
        $this->egreso->destroy($nro_egreso);
        return redirect('/egreso')->with('status', 'Egreso ELIMINADO Exitosamente!');
    }
}
