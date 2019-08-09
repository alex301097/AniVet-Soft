@extends('layouts.master')
@section('css')
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
  <div class="row">
    <div class="col-md-12">
      <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example" data-slide-to="1"></li>
          <li data-target="#carousel-example" data-slide-to="2"></li>
        </ol>

          <div class="carousel-inner">
            <div class="item active">
              <a href="#"><img src="{{ URL::to('img/brand/veterinaria1.jpg') }}" /></a>
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>
            </div>
            <div class="item">
              <a href="#"><img src="{{ URL::to('img/brand/veterinaria2.jpg') }}" /></a>
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>
            </div>
            <div class="item">
              <a href="#"><img src="{{ URL::to('img/brand/veterinaria3.jpg') }}" /></a>
              <div class="carousel-caption">
                <h3></h3>
                <p></p>
              </div>
            </div>
          </div>
        </div>

        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>

    </div>
  <br/>
  <div class="row">
    <div class="col-md-12">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ubicación y horarios</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Colapsar">
              <i class="fa fa-minus"></i></button>
            </div>
          </div>
        </div>
        <div class="box-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <section id="texto">
                <h3><b>Información de la Veterinaria El Yugo</b></h3>
                <!--se inserta la dirección completa que queremos mostrar en el mapa-->
                    <br>
                  <!--nos devuelve la latitud-->
                    Horario: <span style="color:black;" id="x">Lunes a Viernes de 7:00 am a 6:00 pm y Sábados de 7:00 am a 5:00 pm.</span>
                    <br>
                    <!--nos devuelve la longitud-->
                    Telefono: <span style="color:black;" id="y">2487-6064 y al 8902-8381</span>
                    <br>
                    <!--nos devuelve la direcion completa-->
                    Dirección de correo:<span style="color:blue;" id="direccion"> veterinariaelyugo@hotmail.com</span>
                    <br>
                    <br>
                    <h3><b>Sigue nuestras redes sociales</b></h3>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="iconos-sociales" href="#" target="_blank"><img alt="!Sígueme en Facebook!" height="45" width="45" src="https://2.bp.blogspot.com/-28mh2hZK3HE/XCrIxxSCW0I/AAAAAAAAH_M/XniFGT5c2lsaVNgf7UTbPufVmIkBPnWQQCLcBGAs/s1600/facebook.png" title="!Sígueme en Facebook!"/></a>
                    <a class="iconos-sociales" href="#" target="_blank"><img alt="! Sígueme en Instagram!" height="45" width="45" src="https://4.bp.blogspot.com/-Ilxti1UuUuI/XCrIy6hBAcI/AAAAAAAAH_k/QV5KbuB9p3QB064J08W2v-YRiuslTZnLgCLcBGAs/s1600/instagram.png" title="!Sígueme en Instagram!"/></a>
                  </section>
              </div>
              <div class="col-md-6">
                <div id="mapa">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.699883494677!2d-84.32001468520613!3d9.958908692879357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0568eb10e5959%3A0xe924d7c66047e3b9!2sFarmacia+Veterinaria+El+Yugo!5e0!3m2!1ses!2scr!4v1565229394210!5m2!1ses!2scr" width="450" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
  </div>
@endsection
@section('script')
@endsection
