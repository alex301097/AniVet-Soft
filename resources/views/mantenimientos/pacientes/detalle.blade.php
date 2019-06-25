@extends('layouts.master')
@section('css')
  <!-- lightgallery css links -->
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/css/lightgallery.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/css/lg-transitions.min.css" />
  <link type="text/css" href="{{ URL::to('css/lightgallery.css') }}" rel="stylesheet">

@endsection
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-gradient-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Detalle</h6>
                  <h2 class="text-white mb-0">Paciente en {{$paciente->estado}}</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Nombre:</b><span style="color:gray;">&nbsp;{{$paciente->nombre}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Edad:</b><span style="color:gray;">&nbsp;{{$paciente->edad}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Peso:</b><span style="color:gray;">&nbsp;{{$paciente->peso}}</span></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Fecha de nacimiento:</b><span style="color:gray;">&nbsp;{{$paciente->fecha_nacimiento}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Sexo:</b><span style="color:gray;">&nbsp;{{$paciente->sexo}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Especie:</b><span style="color:gray;">&nbsp;{{$paciente->tipo_animal->descripcion}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Raza:</b><span style="color:gray;">&nbsp;{{$paciente->raza}}</span></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Observaciones:</b><span style="color:gray;">&nbsp;{{$paciente->observaciones}}</span></label>
                </div>
              </div>
              @if (!empty($paciente->imagenes))
              <h1 style="color:white;"><i class="ni ni-bold-right"></i> Imagenes</h1>
                <div class="demo-gallery">
                  <ul id="lightgallery">
                    @foreach ($paciente->imagenes as $imagen)
                      <li  data-src="{{ url('imgPacientes/'.$imagen->imagen) }}"
                      data-sub-html="<h4>Nombre: {{$paciente->nombre}}</h4>
                      <p>
                        Especie: {{$paciente->tipo_animal->descripcion}} - Raza: {{$paciente->raza}} - Edad: {{$paciente->edad}} años
                        <br>
                        Observaciones: {{$paciente->observaciones}}
                      </p>">
                        <a href="">
                          <img class="img-responsive" src="{{ url('imgPacientes/'.$imagen->imagen) }}" alt="{{$paciente->nombre}}">
                          <div class="demo-gallery-poster">
                            <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                          </div>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              @else
                <h3 style="color:white;"><i class="ni ni-fat-delete"></i> No tienes imagenes añadidas del paciente. Por favor agregalas.</h3>
              @endif
            </div>
          </div>
        </div>
    </div>
@endsection
@section('scripts')
  <!-- lightgallery js links -->
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-fullscreen.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-hash.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-pager.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-autoplay.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-zoom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-share.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/lib/jquery.mousewheel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-thumbnail.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/lib/picturefill.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function() {
          $("#lightgallery").lightGallery();
      });
  </script>
@endsection