<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cita;
use App\User;
use App\Paciente;
use App\Rol;
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
      $roles = Rol::orderBy('created_at', 'desc')->get();
      return view('reportes.usuarios.index',['roles'=>$roles]);
    }

    public function pdf_usuarios($min, $max, $rol, $estado)
    {
      $min = $min;
      $max = $max;
      $rol = $rol;
      $estado = $estado;

      if(!empty($estado) && $estado == "deshabilitados"){
        if (!empty($min) && !empty($max)) {
          if(!empty($rol) && $rol != "0"){
            $usuarios = User::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])
            ->where('rol_id', '=', $rol)
            ->onlyTrashed()->get();
          }else{
            $usuarios = User::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->onlyTrashed()->get();
          }
        }else{
          if(!empty($rol) && $rol != "0"){
            $usuarios = User::orderBy('created_at', 'desc')
            ->where('rol_id', '=', $rol)
            ->onlyTrashed()->get();
          }else{
            $usuarios = User::orderBy('created_at', 'desc')->onlyTrashed()->get();
          }
        }
      }else {
        if (!empty($min) && !empty($max)) {
          if(!empty($rol) && $rol != "0"){
            $usuarios = User::orderBy('created_at', 'desc')
            ->where('rol_id', '=', $rol)
            ->whereBetween('created_at', [$min, $max])->get();
          }else{
            $usuarios = User::orderBy('created_at', 'desc')->whereBetween('created_at', [$min, $max])->get();
          }
        }else{
          if(!empty($rol) && $rol != "0"){
            $usuarios = User::orderBy('created_at', 'desc')
            ->where('rol_id', '=', $rol)->get();
          }else{
            $usuarios = User::orderBy('created_at', 'desc')->get();

          }
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

    function reporte_expediente_medico(){
      $pacientes = Paciente::orderBy('created_at', 'desc')->get();
      return view('reportes.expediente_medico.index',['pacientes'=>$pacientes]);
    }

    public function pdf_expediente_medico($id)
    {
      $cita = Cita::where('id', '=', $id)
              ->with(['paciente' => function ($data) {
                $data->with('user','imagenes');
              },'resultado','checkeos'])->onlyTrashed()->first();

      $pdf = PDF::loadView('reportes.expediente_medico.pdf', compact('cita'));
      return $pdf->stream('expediente_medico-'.($cita->paciente->nombre)?$cita->paciente->nombre:"Sin nombre".'.pdf');
    }

}
