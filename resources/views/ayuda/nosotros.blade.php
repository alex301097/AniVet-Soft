@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/nosotros.css') }}" type="text/css">
  <style>
    .iconos-sociales img{border-radius:50px;}
    .iconos-sociales img{margin:5px;}
    .iconos-sociales img{
    transition:all 0.5s ease-out;
    border-radius:50px;}
    .iconos-sociales img:hover{
    transform: rotate(360deg);
    }
  </style>
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ayuda
      <small>Nosotros</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Desarrolladores de la pagina web</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6">
              <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                  <div class="mainflip">
                      <div class="frontside">
                          <div class="card">
                              <div class="card-body text-center">
                                  <p><img class=" img-fluid" src="{{asset('img\brand\carlos.jpg')}}" alt="card image"></p>
                                  <h4 class="card-title">Carlos Fernández Rojas</h4>
                                  <p class="card-text">Estudiante de la carrera de Ingeniería en Software.</p>
                                  <p class="card-text">Desarrollador, analista y arquitecto de sistemas.</p>
                                  <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                              </div>
                          </div>
                      </div>
                      <div class="backside">
                              <div class="card-body text-center mt-4">
                                <h4 class="card-title">Carlos Fernández Rojas</h4>
                                <p class="card-text">Estudiante de la carrera de Ingeniería en Software.</p>
                                <p class="card-text">Desarrollador, analista y arquitecto de sistemas.</p>
                                <h3><b>Contactanos</b></h3>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="iconos-sociales"  href="https://www.facebook.com/carlos.fernandezrojas.7" target="_blank"><img alt="!Sígueme en Facebook!" height="45" width="45" src="https://2.bp.blogspot.com/-28mh2hZK3HE/XCrIxxSCW0I/AAAAAAAAH_M/XniFGT5c2lsaVNgf7UTbPufVmIkBPnWQQCLcBGAs/s1600/facebook.png" title="!Sígueme en Facebook!"/></a>
                                <a class="iconos-sociales" href="mailto:caferro16@gmail.com" target="_blank"><img alt="!Contactame por correo electronico!" height="45" width="45" src="{{ url('img/brand/gmail.png') }}" title="!Contactame por correo electronico!"/></a>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ./Team member -->
          <!-- Team member -->
          <div class="col-xs-12 col-sm-6">
              <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                  <div class="mainflip">
                      <div class="frontside">
                          <div class="card">
                              <div class="card-body text-center">
                                  <p><img class=" img-fluid" src="{{asset('img\brand\alex.jpg')}}" alt="card image"></p>
                                  <h4 class="card-title">Alexander Villalobos Oglivie</h4>
                                  <p class="card-text">Estudiante de la carrera de Ingeniería en Software.</p>
                                  <p class="card-text">Desarrollador, analista y arquitecto de sistemas.</p>
                                  <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                              </div>
                          </div>
                      </div>
                      <div class="backside">
                              <div class="card-body text-center mt-4">
                                <h4 class="card-title">Alexander Villalobos Oglivie</h4>
                                <p class="card-text">Estudiante de la carrera de Ingeniería en Software.</p>
                                <p class="card-text">Desarrollador, analista y arquitecto de sistemas.</p>
                                <h3><b>Contactanos</b></h3>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="iconos-sociales"  href="https://www.facebook.com/alooxalv" target="_blank"><img alt="!Sígueme en Facebook!" height="45" width="45" src="https://2.bp.blogspot.com/-28mh2hZK3HE/XCrIxxSCW0I/AAAAAAAAH_M/XniFGT5c2lsaVNgf7UTbPufVmIkBPnWQQCLcBGAs/s1600/facebook.png" title="!Sígueme en Facebook!"/></a>
                                <a class="iconos-sociales" href="mailto:alexandervillalobos50@gmail.com" target="_blank"><img alt="!Contactame por correo electronico!" height="45" width="45" src="{{ url('img/brand/gmail.png') }}" title="!Contactame por correo electronico!"/></a>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ./Team member -->
      </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
@section('scripts')
@endsection
