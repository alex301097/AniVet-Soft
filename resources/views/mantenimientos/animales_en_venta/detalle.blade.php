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
                  <h2 class="text-white mb-0">Animal en {{$animal->estado}}</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Nombre:</b><span style="color:gray;">&nbsp;{{$animal->nombre}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Edad:</b><span style="color:gray;">&nbsp;{{$animal->edad}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Peso:</b><span style="color:gray;">&nbsp;{{$animal->peso}}</span></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Especie:</b><span style="color:gray;">&nbsp;{{$animal->tipo_animal->descripcion}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Raza:</b><span style="color:gray;">&nbsp;{{$animal->raza}}</span></label>
                </div>
                <div class="col-md-4">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Sexo:</b><span style="color:gray;">&nbsp;{{$animal->sexo}}</span></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Condiciones:</b><span style="color:gray;">&nbsp;{{$animal->condiciones}}</span></label>
                </div>
                <div class="col-md-6">
                  <label style="color:white;"><b><i class="ni ni-bold-right"></i>Observaciones:</b><span style="color:gray;">&nbsp;{{$animal->observaciones}}</span></label>
                </div>
              </div>
              <h1 style="color:white;"><i class="ni ni-bold-right"></i> Imagenes</h1>
              @if (!empty($animal->imagenes))
                <div class="demo-gallery">
                  <ul id="lightgallery">
                    @foreach ($animal->imagenes as $imagen)
                      <li  data-src="{{ url('imgPerfiles/'.$imagen->imagen) }}"
                      data-sub-html="<h4>Nombre: {{$animal->nombre}}</h4>
                      <p>
                        Especie: {{$animal->tipo_animal->descripcion}} - Raza: {{$animal->raza}} - Edad: {{$animal->edad}} años
                        <br>
                        Condiciones: {{$animal->condiciones}}
                        <br>
                        Observaciones: {{$animal->observaciones}}
                      </p>">
                        <a href="">
                          <img class="img-responsive" src="{{ url('imgPerfiles/'.$imagen->imagen) }}" alt="{{$animal->nombre}}">
                          <div class="demo-gallery-poster">
                            <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                          </div>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              @else
                <h3 style="color:white;"><i class="ni ni-fat-delete"></i> No tienes imagenes añadidas al animal. Por favor agregalas.</h3>
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
