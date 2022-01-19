<?php

namespace App\Http\Controllers;

use App\Models\Aporte;
use App\Models\Egreso;
use App\Models\Socio;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    /**
     * Display a ingreso report of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexIngreso()
    {
        // TODO: report aporte input
        $datos['aporte'] = Aporte::all();
        // $countSocio = Socio::all()->count();
        $countSocio = 5;
        $listReportResult = array();
        $listReportDetail = array();
        foreach ($datos['aporte'] as $aporte) {
            $idAporte = $aporte->id;
            $amountAporte = $aporte->monto;
            $descripcion = $aporte->descripcion;
            $result = DB::table('aporte_pago')
                ->select(DB::raw('count(distinct nro_pago) as count_pagos'))
                ->where('id_aporte', '=', $idAporte)->get();
            $countPagoByAporte = 1;
            // $countPagoByAporte = $result[0]->count_pagos;
            $totalPercentage = (100 / ($countSocio * $amountAporte)) * ($amountAporte * $countPagoByAporte);
            // echo $totalPercentage . '---';
            // echo '$totalPercentage' . $totalPercentage . '      ';
            // echo '$descripcion' . $descripcion . '          ';
            $listReportResult[] = $totalPercentage;
            $listReportDetail[] = $descripcion;
            // var_dump($listReportResult);
            // var_dump($listReportDetail);
        }
        // TODO: report multa input
        return view('gestion_de_contabilidad.reportes.index_ingresos', [
            'listReportDetail' => $listReportDetail,
            'listReportResult' => $listReportResult
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
        $listReportDetail = array();
        $listReportResult = array();
        $datos['egreso'] = Egreso::all();
        foreach ($datos['egreso'] as $egreso) {
            $descripcion = $egreso->detalle;
            $monto = $egreso->monto;
            $listReportDetail[] = $descripcion;
            $listReportResult[] = $monto;
        }
        return view('gestion_de_contabilidad.reportes.index_egresos', [
            'listReportDetail' => $listReportDetail,
            'listReportResult' => $listReportResult
        ]);
    }
}
