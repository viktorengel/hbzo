@extends('layouts.panel')

@section('title','Registrar nueva cita')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endsection

@section('subtitle','Registrar nueva cita')

@section('content')
<div class="header bg-gradient-primary pb-6 pt-3 pt-md-6">
     
    </div> 
     
    <div class="container-fluid mt--7">
      
      <div class="row mt-5">
        <div class="col-xl-12 mb-12 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 btnagregar">Registrar nueva cita</h3>
                   
                </div>
              </div>
            </div>
             
               @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif


             <div class="panel-body formregistros" style="margin: 20px;">
                
              <form action="{{ url('appointments') }}" method="post">
                
                          @csrf
                          <div class="row">
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input name="description" value="{{ old('description') }}" id="description" type="text" class="form-control" placeholder="Describe brevemente la consulta" required>
                              </div>
                          </div> 

                          @if($role =='admin') 
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="specialty">Paciente</label>
                            <select class="form-control selectpicker" data-live-search="true" name="paciente_id" required data-style="btn-inverse">
                              <option value="">Seleccionar Paciente</option>
                              @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" @if(old('paciente_id') == $paciente->id) selected @endif>{{ $paciente->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          @endif

                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <label for="specialty">Especialidad</label>
                            <select name="especialidad_id" id="specialty" class="form-control" required>
                              <option value="">Seleccionar especialidad</option>
                              @foreach ($specialties as $specialty)
                                <option value="{{ $specialty->id }}" @if(old('especialidad_id') == $specialty->id) selected @endif>{{ $specialty->name }}</option>
                              @endforeach
                            </select>
                          </div>


                          <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                           <label for="email">Médico</label>
                            <select name="doctor_id" id="doctor" required class="form-control selectpicker" data-live-search="true" data-style="btn-inverse">
                              
                              @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" @if(old('doctor_id') == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                              @endforeach
              
                            </select>
                                             
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="cedula">Fecha</label>
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                  </div>
                                <input class="form-control datepicker" placeholder="Seleccionar fecha" 
                                  id="date" name="scheduled_date" type="text" 
                                  value="{{ old('scheduled_date', date('Y-m-d')) }}" 
                                  data-date-format="yyyy-mm-dd" 
                                  data-date-start-date="{{ date('Y-m-d') }}" 
                                  data-date-end-date="+30d">
                              </div>
                                                     
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <label for="address">Hora de atención</label>
                                <div id="hours">
                                    @if ($intervals)
                                  @foreach ($intervals['morning'] as $key => $interval)
                                    <div class="custom-control custom-radio mb-3">
                                      <input name="scheduled_time" value="{{ $interval['start'] }}" class="custom-control-input" id="intervalMorning{{ $key }}" type="radio" required>
                                      <label class="custom-control-label" for="intervalMorning{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }}</label>
                                    </div>
                                  @endforeach
                                  @foreach ($intervals['afternoon'] as $key => $interval)
                                    <div class="custom-control custom-radio mb-3">
                                      <input name="scheduled_time" value="{{ $interval['start'] }}" class="custom-control-input" id="intervalAfternoon{{ $key }}" type="radio" required>
                                      <label class="custom-control-label" for="intervalAfternoon{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }}</label>
                                    </div>
                                  @endforeach
                                @else
                                  <div class="alert alert-info" role="alert">
                                    Seleccione un médico y una fecha, para ver sus horas disponibles.
                                  </div>
                                @endif
                                </div>                            
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="type">Tipo de consulta</label>
                                <div class="custom-control custom-radio mb-3">
                                  <input name="type" class="custom-control-input" id="type1" type="radio"
                                    @if(old('type', 'Consulta') == 'Consulta') checked @endif value="Consulta">
                                  <label class="custom-control-label" for="type1">Consulta</label>
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                  <input name="type" class="custom-control-input" id="type2" type="radio"
                                    @if(old('type') == 'Examen') checked @endif value="Examen">
                                  <label class="custom-control-label" for="type2">Examen</label>
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                  <input name="type" class="custom-control-input" id="type3" type="radio"
                                    @if(old('type') == 'Operación') checked @endif value="Operación">
                                  <label class="custom-control-label" for="type3">Operación</label>
                                </div>                          
                          </div>


                         

                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn  btn-primary" type="submit"><i class="fa fa-save"></i> Guardar </button>

                      </div>
              </form>
                    


            </div>
            

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection

@section('scripts')
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>
<script  src="{{ asset('/js/appointments/create.js') }}"></script>
<script>
  $('.datepicker').datepicker({
    language: 'es'
});

</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
@endsection

