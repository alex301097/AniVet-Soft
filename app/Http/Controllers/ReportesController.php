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

    public function mostrar_pdf()
    {
      $citas = Cita::all();

      $pdf = PDF::loadView('reportes.citas.pdf',compact('citas'));
      return $pdf->stream('cita.pdf');
    }
}
