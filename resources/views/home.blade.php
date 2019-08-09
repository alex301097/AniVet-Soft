@extends('layouts.master')
@section('css')
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
            <a href="#"><img src="http://placekitten.com/1600/600" /></a>
            <div class="carousel-caption">
              <h3>Meow</h3>
              <p>Just Kitten Around</p>
            </div>
          </div>
          <div class="item">
            <a href="#"><img src="http://placekitten.com/1600/600" /></a>
            <div class="carousel-caption">
              <h3>Meow</h3>
              <p>Just Kitten Around</p>
            </div>
          </div>
          <div class="item">
            <a href="#"><img src="http://placekitten.com/1600/600" /></a>
            <div class="carousel-caption">
              <h3>Meow</h3>
              <p>Just Kitten Around</p>
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
  </div>
  <br/>
  <div class="row">
    <div class="col-md-12">
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Ubicacion y horarios</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Colapsar">
              <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <section id="texto">
                    <h3>Información de la veterinaria</h3>
                    <!--se inserta la dirección completa que queremos mostrar en el mapa-->
                    <br>
                    <!--nos devuelve la latitud-->
                    Horario: <span style="color:black;" id="x">Lunes a Viernes de 7:00 am a 6:00 pm y Sábados de 7:00 am a 5:00 pm</span>
                    <br>
                    <!--nos devuelve la longitud-->
                    Telefono: <span style="color:black;" id="y">2487-6064</span>
                    <br>
                    <!--nos devuelve la direcion completa-->
                    Dirección de correo:<br><span style="color:blue;" id="direccion">veterinariaelyugo@hotmail.com</span>
                    <br>
                  </section>
                </div>
                <div class="col-md-6">
                  <div id="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.699883494677!2d-84.32001468520613!3d9.958908692879357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0568eb10e5959%3A0xe924d7c66047e3b9!2sFarmacia+Veterinaria+El+Yugo!5e0!3m2!1ses!2scr!4v1565229394210!5m2!1ses!2scr" width="450" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
    </div>
  </div>
@endsection
@section('script')
@endsection
