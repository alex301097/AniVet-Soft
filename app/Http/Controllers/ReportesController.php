<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cita;
use PDF;

class ReportesController extends Controller
{
    function reporte_citas(){
      return view('reportes.citas.index');
    }

    public function pdf_citas($min, $max, $estado)
    {
      $min = $min;
      $max = $max;
      $estado = $estado;

      if(!empty($estado) && $estado == "deshabilitados"){
        if (!empty($min) && !empty($max)) {
        $citas = Cita::orderBy('created_at', 'desc')->whereBetween('fecha', [$min, $max])->onlyTrashed()->get();
        }else{
          $citas = Cita::orderBy('created_at', 'desc')->onlyTrashed()->get();
        }
      }else {
        if (!empty($min) && !empty($max)) {
        $citas = Cita::orderBy('created_at', 'desc')->whereBetween('fecha', [$min, $max])->get();
        }else{
        $citas = Cita::orderBy('created_at', 'desc')->get();
        }
      }

      $pdf = PDF::loadView('reportes.citas.pdf', compact('citas'));
      return $pdf->stream('cita.pdf');
    }
}
