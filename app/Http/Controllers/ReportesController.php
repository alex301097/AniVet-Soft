<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cita;
use App\User;
use App\Paciente;
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

    function reporte_usuarios(){
      return view('reportes.usuarios.index');
    }

    public function pdf_usuarios($min, $max, $estado)
    {
      $min = $min;
      $max = $max;
      $estado = $estado;

      if(!empty($estado)){
        if (!empty($min) && !empty($max)) {
        $usuarios = User::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->onlyTrashed()->get();
        }else{
          $usuarios = User::orderBy('created_at', 'desc')->onlyTrashed()->get();
        }
      }else {
        if (!empty($min) && !empty($max)) {
        $usuarios = User::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->get();
        }else{
        $usuarios = User::orderBy('created_at', 'desc')->get();
        }
      }

      $pdf = PDF::loadView('reportes.usuarios.pdf', compact('usuarios'));
      return $pdf->stream('usuario.pdf');
    }

    function reporte_pacientes(){
      return view('reportes.pacientes.index');
    }

    public function pdf_pacientes($min, $max, $estado)
    {
      $min = $min;
      $max = $max;
      $estado = $estado;

      if(!empty($estado) && $estado == "deshabilitados"){
        if (!empty($min) && !empty($max)) {
        $pacientes = Paciente::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->onlyTrashed()->get();
        }else{
          $pacientes = Paciente::orderBy('created_at', 'desc')->onlyTrashed()->get();
        }
      }else {
        if (!empty($min) && !empty($max)) {
        $pacientes = Paciente::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->get();
        }else{
        $pacientes = Paciente::orderBy('created_at', 'desc')->get();
        }
      }

      $pdf = PDF::loadView('reportes.pacientes.pdf', compact('pacientes'));
      return $pdf->stream('pacientes.pdf');
    }

}
