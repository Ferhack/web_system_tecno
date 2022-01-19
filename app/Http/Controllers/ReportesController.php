<?php

namespace App\Http\Controllers;

use App\Models\Aporte;
use App\Models\AportePago;
use App\Models\Socio;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    /**
     * Display a ingreso report of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIngreso()
    {
        // TODO: get view principal multa manage
        // $datos['multa'] = Multa::all();
        // $aporte['aporte'] = Aporte::all();
        // $countSocio = Socio::all()->count();
        $array1 = array(1, 2, 5, 9, 1, 20, -3, 6, 50, 23, 20, 15);
        $array2 = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        // foreach ($aporte as $aporteToMake) {
        //     $idAporte = $aporteToMake->id;
        //     $amountAporte = $aporteToMake->monto;
        //     $descripcion = $aporteToMake->description;
        //     AportePago::where('')
        // }
        return view('gestion_de_contabilidad.reportes.index_ingresos', [
            'mes' => $array2,
            'values' => $array1
        ]);
    }

    /**
     * Display a egreso report of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEgreso()
    {
        // TODO: get view principal multa manage
        // $datos['multa'] = Multa::all();
        // return view('gestion_de_pago_de_aportes.multa.index', $datos);
        $array1 = array(1, 2, 5, 9, 1, 20, 33, 6, 50, 23, 20, 15);
        $array2 = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        return view('gestion_de_contabilidad.reportes.index_egresos', [
            'mes' => $array2,
            'values' => $array1
        ]);
    }
}
