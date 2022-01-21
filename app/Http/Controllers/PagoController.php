<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\User;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    private $pago;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->pago = new Pago();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pagos'] = $this->pago->select('pago.*', $this->pago->raw('get_name_by_userci(pago.ci_empleado) as empleado'), $this->pago->raw('get_name_by_userci(pago.ci_socio) as socio'))
            ->orderBy('pago.fecha_pago', 'desc')
            ->get();
        return view('gestion_de_pago_de_aportes.pago.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['socios'] = User::where('tipo_usuario', 'S')->where('estado', '1')->get();
        return view('gestion_de_pago_de_aportes.pago.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->pago->fecha_pago = date('Y/m/d');
        $this->pago->monto_total = 0;
        $this->pago->comprobante = $request->comprobante;
        $this->pago->ci_empleado = $request->ci_empleado;
        $this->pago->ci_socio = $request->ci_socio;
        $this->pago->save();
        return redirect('/pago')->with('status', 'Pago CREADO Exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $nro_pago
     * @return \Illuminate\Http\Response
     */
    public function edit($nro_pago)
    {
        $socios = User::where('tipo_usuario', 'S')->where('estado', '1')->get();
        $pago = $this->pago->where('nro_pago', $nro_pago)->first();
        return view('gestion_de_pago_de_aportes.pago.edit', ['socios' => $socios, 'pago' => $pago]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $nro_pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nro_pago)
    {
        $this->pago = $this->pago->find($nro_pago);
        $this->pago->comprobante = $request->comprobante;
        $this->pago->ci_socio = $request->ci_socio;
        $this->pago->save();
        return redirect('/pago')->with('status', 'Pago MODIFICADO Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $nro_pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($nro_pago)
    {
        $this->pago->destroy($nro_pago);
        return redirect('/pago')->with('status', 'Pago ELIMINADO Exitosamente!');
    }
}
