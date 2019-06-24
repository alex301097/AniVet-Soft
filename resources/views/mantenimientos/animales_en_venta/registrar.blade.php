@extends('layouts.master')
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Registro</h6>
                  <h2 class="mb-0">Animales</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre"><h5>Nombre</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre" name="nombre" placeholder="Nombre">
                      <p class="error-nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="edad"><h5>Edad</h5></label>
                      <input type="number" class="form-control form-control-sm form-control-alternative" id="edad" name="edad" placeholder="Edad">
                      <p class="error-edad text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tipo_animal"><h5>Tipo de animal</h5></label>
                      <select class="form-control form-control-sm" id="tipo_animal" name="tipo_animal">
                        <option value="">Seleccione una opción</option>
                        @foreach ($tipos_animales as $tipo_animal)
                          <option value="{{$tipo_animal->id}}">{{$tipo_animal->descripcion}}</option>
                        @endforeach
                      </select>
                      <p class="error-tipo_animal text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="raza"><h5>Raza</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="raza" name="raza" placeholder="Raza">
                      <p class="error-raza text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fecha_nacimiento"><h5>Fecha de nacimiento</h5></label>
                        <div class="input-group">
                            <input type="date" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                        </div>
                        <p class="error-fecha_nacimiento text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">

                        <div class="form-group">
                          <label for="nacionalidad"><h5>Sexo</h5></label>
                          <div class="row">
                            <div class="col-md-6 text-center">
                              <div class="custom-control custom-radio mb-3">
                                <input name="sexo" class="custom-control-input" id="macho" value="Macho" checked type="radio">
                                <label class="custom-control-label" for="macho">Macho</label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="custom-control custom-radio mb-3">
                                <input name="sexo" class="custom-control-input" id="hembra" value="Hembra" type="radio">
                                <label class="custom-control-label" for="hembra">Hembra</label>
                              </div>
                            </div>
                          </div>
                        </div>

                    <div class="row">
                      <div class="col-md-12">
                        <p class="error-sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="condiciones"><h5>Condiciones</h5></label>
                      <textarea class="form-control" id="condiciones" name="condiciones" rows="3" placeholder="Condiciones"></textarea>
                      <p class="error-condiciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="observaciones"><h5>Observaciones</h5></label>
                      <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Observaciones"></textarea>
                      <p class="error-observaciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="peso"><h5>Peso</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="peso" name="peso" placeholder="Peso">
                      <p class="error-peso text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="precio"><h5>Precio</h5></label>
                      <input type="number" class="form-control form-control-sm form-control-alternative" id="precio" name="precio" placeholder="Precio">
                      <p class="error-precio text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="cantidad"><h5>Cantidad</h5></label>
                      <input type="number" class="form-control form-control-sm form-control-alternative" id="cantidad" name="cantidad" placeholder="Cantidad">
                      <p class="error-cantidad text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="descripcion"><h5>Descripción</h5></label>
                      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción"></textarea>
                      <p class="error-descripcion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="estado"><h5>Estado</h5></label>
                      <select class="form-control form-control-sm" id="estado" name="estado">
                        <option value="">Seleccione una opción</option>
                        <option value="En venta">En venta</option>
                        <option value="En adopción">En adopción</option>
                      </select>
                      <p class="error-estado text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    @csrf
                    <button class="btn btn-icon btn-3 btn-primary" type="button" id="registrar" name="registrar">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir animal</span>
                    </button>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2500
    });

    const swal_confirm = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    });

    //Añadir
    $('#registrar').click(function(){

      $.ajax({
        type: 'post',
        url: '{{route('animales.añadir')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'tipo_animal': $('#tipo_animal').val(),
          'nombre': $('#nombre').val(),
          'edad': $('#edad').val(),
          'peso': $('#peso').val(),
          'raza': $('#raza').val(),
          'fecha_nacimiento': $('#fecha_nacimiento').val(),
          'sexo': $('input[name="sexo"]:checked').val(),
          'precio': $('#precio').val(),
          'observaciones': $('#observaciones').val(),
          'condiciones': $('#condiciones').val(),
          'estado': $('#estado').val(),
        },
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.tipo_animal){
              $('.error-tipo_animal').removeClass('hidden');
              $('.error-tipo_animal').text(data.errors.tipo_animal);
            }

            if(data.errors.nombre){
              $('.error-nombre').removeClass('hidden');
              $('.error-nombre').text(data.errors.nombre);
            }

            if(data.errors.edad){
              $('.error-edad').removeClass('hidden');
              $('.error-edad').text(data.errors.edad);
            }

            if(data.errors.peso){
              $('.error-peso').removeClass('hidden');
              $('.error-peso').text(data.errors.peso);
            }

            if(data.errors.raza){
              $('.error-raza').removeClass('hidden');
              $('.error-raza').text(data.errors.raza);
            }

            if(data.errors.fecha_nacimiento){
              $('.error-fecha_nacimiento').removeClass('hidden');
              $('.error-fecha_nacimiento').text(data.errors.fecha_nacimiento);
            }

            if(data.errors.sexo){
              $('.error-sexo').removeClass('hidden');
              $('.error-sexo').text(data.errors.sexo);
            }

            if(data.errors.precio){
              $('.error-precio').removeClass('hidden');
              $('.error-precio').text(data.errors.precio);
            }

            if(data.errors.estado){
              $('.error-estado').removeClass('hidden');
              $('.error-estado').text(data.errors.estado);
            }
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'El animal se ha registrado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              var url = "{{route('animales')}}";
									document.location.href=url;
            }, 2000);
        }
        },
      });

    });
  </script>

@endsection
