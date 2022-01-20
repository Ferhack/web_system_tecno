<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingreso;

class IngresoController extends Controller
{
    private $ingreso;
    
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // middleware to protected the routes
        $this->middleware('auth');

        $this->ingreso = new Ingreso();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ingresos'] = $this->ingreso->join('users', 'users.ci', '=', 'ingreso.ci_empleado')
            ->select('ingreso.*','users.nombre')
            ->orderBy('ingreso.fecha_ingreso', 'desc')
            ->get();
        return view('gestion_de_contabilidad.ingreso.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('gestion_de_contabilidad.ingreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->ingreso->detalle = $request->detalle;
        $this->ingreso->fecha_ingreso = date('Y/m/d');
        $this->ingreso->monto = $request->monto;
        $this->ingreso->ci_empleado = $request->ci_empleado;
        $this->ingreso->save();
        return redirect('/ingreso')->with('status', 'Ingreso CREADO Exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $nro_ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit($nro_ingreso)
    {
        $data['ingreso'] = $this->ingreso->where('nro_ingreso', $nro_ingreso)->first();
        return view('gestion_de_contabilidad.ingreso.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $nro_ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nro_ingreso)
    {
        $this->ingreso = $this->ingreso->find($nro_ingreso);
        $this->ingreso->detalle = $request->detalle;
        $this->ingreso->monto = $request->monto;
        $this->ingreso->save();
        return redirect('/ingreso')->with('status', 'Ingreso MODIFICADO Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $nro_ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($nro_ingreso)
    {
        $this->ingreso->destroy($nro_ingreso);
        return redirect('/ingreso')->with('status', 'Ingreso ELIMINADO Exitosamente!');
    }
}
