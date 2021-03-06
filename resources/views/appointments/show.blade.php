@extends('layouts.panel')

@section('title','Detalle Paciente')

@section('styles')

@endsection

@section('subtitle','Detalle cita')

@section('content')

<div class="header bg-gradient-success pb-6 pt-3 pt-md-6">
     
    </div> 
     
    <div class="container-fluid mt--7">
      
      <div class="row mt-5">
        <div class="col-xl-12 mb-12 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Cita #{{ $appointment->id }}</h3>
                   
                </div>
              </div>
            </div>
             <div class="card-body">
      <ul> 
        <li>
          <strong>Fecha:</strong> {{ $appointment->scheduled_date }}
        </li>
        <li>
          <strong>Hora:</strong> {{ $appointment->scheduled_time_12 }}
        </li>
        
        @if ($role == 'patient' || $role == 'admin')
          <li>
            <strong>Médico:</strong> {{ $appointment->doctor->name }}
          </li>
        @endif

        @if ($role == 'doctor' || $role == 'admin')
          <li>
            <strong>Paciente:</strong> {{ $appointment->patient->name }}
          </li>
        @endif

        <li>
          <strong>Especialidad:</strong> {{ $appointment->especialidad['name'] }}
        </li>

        <li>
          <strong>Tipo:</strong> {{ $appointment->type }}
        </li>
        <li>
          <strong>Estado:</strong> 
          @if ($appointment->status == 'Cancelada')
            <span class="badge badge-danger">Cancelada</span>
          @else
            <span class="badge badge-success">{{ $appointment->status }}</span>
          @endif
        </li>
      </ul>

      @if ($appointment->status == 'Cancelada')
        <div class="alert alert-warning">
          <p>Acerca de la cancelación:</p>
          <ul>
            @if ($appointment->cancellation)
              <li>
                <strong>Fecha de cancelación:</strong>
                {{ $appointment->cancellation->created_at }}
              </li>
              <li>
                <strong>¿Quién canceló la cita?:</strong>
                @if (auth()->id() == $appointment->cancellation->cancelled_by_id)
                  Tú
                @else
                  {{ $appointment->cancellation->cancelled_by->name }}
                @endif
              </li>
              <li>
                <strong>Justificación:</strong>
                {{ $appointment->cancellation->justification }}
              </li>
            @else
              <li>Esta cita fue cancelada antes de su confirmación.</li>
            @endif
          </ul>
        </div>
      @endif

      <a href="{{ url('/appointments') }}" class="btn btn-default">
        Volver
      </a>
    </div>
                         

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection


