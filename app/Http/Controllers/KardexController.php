<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class KardexController extends Controller
{
    private $pago;
    
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // middleware to protected the routes
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ci_socio)
    {
        $socio = DB::table('users')->join('socio', 'users.ci', '=', 'socio.ci')
                    ->where('users.ci', $ci_socio)
                    ->select('users.ci', 'users.nombre', 'users.telefono', 'socio.nro_puesto')
                    ->first();

        $paidAportes = DB::select(
            'select p.nro_pago, a.descripcion, a.fecha_limite , p.fecha_pago ,a.monto , a.porcentaje_mora ,ap.monto_mora 
            from pago p, aporte a, aporte_pago ap, socio s 
            where p.nro_pago = ap.nro_pago and a.id = ap.id_aporte and p.ci_socio = s.ci and s.ci = ?
            order by p.fecha_pago desc ,p.nro_pago;', 
            [$ci_socio]
        );
        
        $paidMultas = DB::select(
            'select p.nro_pago, m.descripcion, m.monto, p.monto_total 
            from pago p , multa m , multa_pago mp , socio s 
            where p.nro_pago = mp.nro_pago and m.id = mp.id_multa and p.ci_socio = s.ci and s.ci = ?
            order by p.fecha_pago ,p.nro_pago;',
            [$ci_socio]
        );

        $unpaidAportes = DB::select(
            'select * from aporte a where a.id not in (select ap.id_aporte
            from socio s , pago p , aporte_pago ap 
            where s.ci = p.ci_socio  and p.nro_pago = ap.nro_pago and s.ci =  ?)
            order by a.fecha_limite asc;', 
            [$ci_socio]
        );

        $unpaidMultas = DB::select(
            'select * 
            from multa m 
            where m.id in (select ms.id_multa from multa_socio ms where ci_socio = ?) 
            and m.id not in (select mp.id_multa
                                from socio s, pago p, multa_pago mp
                                where s.ci = p.ci_socio and p.nro_pago = mp.nro_pago and s.ci = ?);', 
            [$ci_socio, $ci_socio]
        );

        return view('gestion_de_usuarios_asistencia_y_actas.kardex.index', [
            'socio' => $socio,
            'aporte_pagados' => $paidAportes,
            'multa_pagados' => $paidMultas,
            'aporte_no_pagados' => $unpaidAportes,
            'multa_no_pagados' => $unpaidMultas,
        ]);
    }

}
