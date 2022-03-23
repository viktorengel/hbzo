@extends('layouts.panel')

@section('subtitle','Calificar cita')

@section('subtitle','Calificar Cita')

@section('content')
  {{-- form-group col-lg-5 col-md-5 col-sm-5 col-xs-12 --}}

  <div class="header bg-gradient-primary pb-6 pt-3 pt-md-6">
     
    </div>
    
    <div class="container-fluid mt--7">
      
      <div class="row mt-5">
        <div class="col-xl-12 mb-12 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 ">Calificar cita</h3>
                   
                </div>
              </div>
            </div>
             <div class="panel-body" style="margin: 20px;">
              @if (session('notification'))
      <div class="alert alert-success" role="alert">
        {{ session('notification') }}
      </div>
      @endif 

      @if ($role == 'patient')
      <p>
        Estás a punto de calificar tu cita reservada con el médico 
        {{ $appointment->doctor->name }} 
        (especialidad {{ $appointment->especialidad->name }}) 
        para el día {{ $appointment->scheduled_date }}:
      </p>
      @endif




            <form action="{{ url('/calificacion/'.$appointment->id) }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="justification">Por favor seleccione la calificación:</label>
              <select name="calificacion" class="form-control">

                <option value="1">⭐ ✩ ✩ ✩ ✩</option>
                <option value="2">⭐⭐ ✩ ✩ ✩</option>
                <option value="3">⭐⭐⭐ ✩ ✩</option>
                <option value="4">⭐⭐⭐⭐ ✩</option>
                <option value="5">⭐⭐⭐⭐⭐</option>

              </select>
            </div>        

            <button class="btn btn-success" type="submit">Calificar cita</button>
            <a href="{{ url('/appointments') }}" class="btn btn-default">
              Volver al listado de citas sin calificar
            </a>
          </form>


            </div>
            

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>
@endsection
