<?php

namespace App\Http\Controllers;

use App\Models\Aporte;
use App\Models\Egreso;
use App\Models\Ingreso;
use App\Models\Multa;
use App\Models\MultaSocio;
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
        $countSocio = Socio::all()->count();
        $listReportResult = array();
        $listReportDetail = array();
        foreach ($datos['aporte'] as $aporte) {
            $idAporte = $aporte->id;
            $amountAporte = $aporte->monto;
            $descripcion = $aporte->descripcion;
            $result = DB::table('aporte_pago')
                ->select(DB::raw('count(distinct nro_pago) as count_pagos'))
                ->where('id_aporte', '=', $idAporte)->get();
            $countPagoByAporte = $result[0]->count_pagos;
            $totalPercentage = (100 / ($countSocio * $amountAporte)) * ($amountAporte * $countPagoByAporte);
            $listReportResult[] = $totalPercentage;
            $listReportDetail[] = $descripcion;
        }
        // TODO: report multa input
        $data['multa'] = Multa::all();
        foreach ($data['multa'] as $multa) {
            $idMulta = $multa['id'];
            $result = DB::table('multa_socio')
                ->select(DB::raw('count(distinct ci_socio) as count_socios'))
                ->where('id_multa', '=', $idMulta)->get();
            $countSocio = $result[0]->count_socios;
            $amountMulta = $multa->monto;
            $descriptionMulta = $multa->descripcion;
            $resultMultaPago = DB::table('multa_pago')
                ->select(DB::raw('count(distinct nro_pago) as count_pagos'))
                ->where('id_multa', '=', $idMulta)->get();
            $countPagoByMulta = $resultMultaPago[0]->count_pagos ?? 0;
            if ($countSocio != 0 && $amountMulta != 0) {
                $totalPercentage = (100 / ($countSocio * $amountMulta)) * ($amountMulta * $countPagoByMulta);
            }
            $listReportResult[] = $totalPercentage;
            $listReportDetail[] = $descriptionMulta;
        }
        // TODO: report input
        $data['ingreso'] = Ingreso::all();
        foreach ($data['ingreso'] as $ingreso) {
            $listReportResult[] = 100;
            $listReportDetail[] = $ingreso->detalle;
        }
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
