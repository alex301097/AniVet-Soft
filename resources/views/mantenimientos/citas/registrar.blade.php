@extends('layouts.master')
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Registro</h6>
                  <h2 class="mb-0">Citas</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="fecha"><h5>Fecha</h5></label>
                      <input type="date" class="form-control form-control-sm form-control-alternative" id="fecha" name="fecha" placeholder="Fecha">
                      <p class="error-fecha text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="paciente"><h5>Paciente</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="paciente" name="paciente" placeholder="Paciente">
                      <p class="error-paciente text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="horaInicio"><h5>Hora Inicial</h5></label>
                      <input type="time" class="form-control form-control-sm form-control-alternative" id="horaInicio" name="horaInicio" placeholder="Hora Inicial">
                      <p class="error-horaInicio text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="horaFinal"><h5>Hora final</h5></label>
                      <input type="time" class="form-control form-control-sm form-control-alternative" id="horaFinal" name="horaFinal" placeholder="Hora final">
                      <p class="error-horaFinal text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="motivo"><h5>Motivo</h5></label>
                      <input type="text" class="form-control" id="motivo" name="motivo" rows="3" placeholder="Motivo">
                      <p class="error-motivo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tipo_animal"><h5>Tipo de servicio</h5></label>
                      <select class="form-control form-control-sm" id="servicio" name="servicio">
                        <option value="">Seleccione una opción</option>
                        @foreach ($servicios as $servicio)
                          <option value="{{$servicio->id}}">{{$servicio->descripcion}}</option>
                        @endforeach
                      </select>
                      <p class="error-servicio text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="estado"><h5>Estado</h5></label>
                      <select class="form-control form-control-sm" id="estado" name="estado">
                        <option value="">Seleccione una opción</option>
                        <option value="Activa">Activa</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Inactiva">Inactiva</option>
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
                      <span class="btn-inner--text">Añadir Cita</span>
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
        url: '{{route('citas.añadir')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'fecha': $('#fecha').val(),
          'horaInicio': $('#horaInicio').val(),
          'horaFinal': $('#horaFinal').val(),
          'motivo': $('#motivo').val(),
          'observaciones': $('#observaciones').val(),
          'estado': $('#estado').val(),
          'servicio': $('#servicio').val(),
          'paciente': $('#paciente').val(),
        },
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.fecha){
              $('.error-fecha').removeClass('hidden');
              $('.error-fecha').text(data.errors.fecha);
            }

            if(data.errors.horaInicio){
              $('.error-horaInicio').removeClass('hidden');
              $('.error-horaInicio').text(data.errors.horaInicio);
            }

            if(data.errors.horaFinal){
              $('.error-horaFinal').removeClass('hidden');
              $('.error-horaFinal').text(data.errors.horaFinal);
            }

            if(data.errors.motivo){
              $('.error-motivo').removeClass('hidden');
              $('.error-motivo').text(data.errors.motivo);
            }

            if(data.errors.observaciones){
              $('.error-observaciones').removeClass('hidden');
              $('.error-observaciones').text(data.errors.observaciones);
            }

            if(data.errors.estado){
              $('.error-estado').removeClass('hidden');
              $('.error-estado').text(data.errors.estado);
            }

            if(data.errors.servicio){
              $('.error-servicio').removeClass('hidden');
              $('.error-servicio').text(data.errors.servicio);
            }

            if(data.errors.paciente){
              $('.error-paciente').removeClass('hidden');
              $('.error-paciente').text(data.errors.paciente);
            }

          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'La cita se ha registrado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              var url = "{{route('citas')}}";
									document.location.href=url;
            }, 2000);
        }
        },
      });

    });
  </script>

@endsection
