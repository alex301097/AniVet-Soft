@extends('layouts.master')
@section('css')
  <!-- lightslider css links -->
  <link rel="stylesheet" rel="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css"></script>
  <link type="text/css" href="{{ URL::to('css/lightslider.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/img/controls.png" rel="icon" type="image/png">
  <style>
    hr.new {
    border: 10px solid white;
    border-radius: 5px;
    }

  </style>
@endsection
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-gradient-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Adopción y Venta de animales</h6>
                  <h2 class="text-white mb-0">Información</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              @foreach ($animales as $animal)
                @if ($animal->estado == "En venta")
                  <h1 style="color:white;">En venta</h1>
                  <div class="container">
                      <div class="row" >
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Nombre:</b><span style="color:gray;">&nbsp;{{$animal->nombre}}</span></label>
                            </div>
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Edad:</b><span style="color:gray;">&nbsp;{{$animal->edad}}</span></label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Peso:</b><span style="color:gray;">&nbsp;{{$animal->peso}}</span></label>
                            </div>
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Especie:</b><span style="color:gray;">&nbsp;{{$animal->tipo_animal->descripcion}}</span></label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Raza:</b><span style="color:gray;">&nbsp;{{$animal->raza}}</span></label>
                            </div>
                            <div class="col-md-6">
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
                          <div class="row">
                            <div class="col-md-12 text-left">
                              <button type="button" class="btn btn-outline-primary">Apartar</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="demo">
                            <ul id="lightSlider">
                                @foreach ($animal->imagenes as $imagen)
                                  <li data-thumb="{{ url('imgPerfiles/'.$imagen->imagen) }}">
                                      <img src="{{ url('imgPerfiles/'.$imagen->imagen) }}" alt="{{$animal->nombre}}"/>
                                  </li>
                                @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                      <hr class="new">
                  </div>
                @else
                  <h1 style="color:white;">En adopción</h1>
                  <div class="container">
                      <div class="row" >
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Nombre:</b><span style="color:gray;">&nbsp;{{$animal->nombre}}</span></label>
                            </div>
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Edad:</b><span style="color:gray;">&nbsp;{{$animal->edad}}</span></label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Peso:</b><span style="color:gray;">&nbsp;{{$animal->peso}}</span></label>
                            </div>
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Especie:</b><span style="color:gray;">&nbsp;{{$animal->tipo_animal->descripcion}}</span></label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label style="color:white;"><b><i class="ni ni-bold-right"></i>Raza:</b><span style="color:gray;">&nbsp;{{$animal->raza}}</span></label>
                            </div>
                            <div class="col-md-6">
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
                          <div class="row">
                            <div class="col-md-12 text-left">
                              <button type="button" class="btn btn-outline-primary">Apartar</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="demo">
                            <ul id="lightSlider">
                                @foreach ($animal->imagenes as $imagen)
                                  <li data-thumb="{{ url('imgPerfiles/'.$imagen->imagen) }}">
                                      <img src="{{ url('imgPerfiles/'.$imagen->imagen) }}" alt="{{$animal->nombre}}"/>
                                  </li>
                                @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                      <hr class="new">
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
    </div>
@endsection
@section('scripts')
  <!-- lightslider js links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>

  <script type="text/javascript">
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 9,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true

        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 400, //ms'
        auto: true,
        slideEndAnimation: true,
        pause: 2000,

        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',

        rtl:false,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,

        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,

    });


  </script>

@endsection
