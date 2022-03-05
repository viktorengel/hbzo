<!-- Navigation -->
        <ul class="navbar-nav">
         
                   
         @if(auth()->user()->role == "admin") {{-- admin--}}

          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/especialidades') }}">
              <i class="ni ni-planet text-blue"></i> Gestion de Especialidad
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctor') }}">
              <i class="ni ni-pin-3 text-orange"></i> Gestion de Médicos
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/paciente') }}">
              <i class="ni ni-single-02 text-yellow"></i> Gestion de Pacientes
            </a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="{{ url('/administrador') }}">
              <i class="ni ni-money-coins"></i> Gestion de Admins
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments') }}">
              <i class="ni ni-time-alarm text-yellow"></i> Gestion de Citas
            </a>
          </li>


          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/charts/appointments/line') }}">
              <i class="ni ni-key-25 text-info"></i> Precuencia de Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/charts/doctors/column') }}">
              <i class="ni ni-circle-08 text-pink"></i> Medicos más Activos
            </a>
          </li>

          @elseif(auth()->user()->role == "doctor") {{-- doctor--}}
           <li class="nav-item">
            <a class="nav-link" href="{{ url('/schedule') }}">
              <i class="ni ni-calendar-grid-58 text-danger"></i> Mis Horarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/paciente') }}">
              <i class="ni ni-time-alarm text-blue"></i> Mis Pacientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments') }}">
              <i class="ni ni-satisfied text-yellow"></i> Mis Citas
            </a>
          </li>
        
         @else {{-- patient--}}
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments/create') }}">
              <i class="ni ni-calendar-grid-58 text-danger"></i> Reservar Cita
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments') }}">
              <i class="ni ni-time-alarm text-yellow"></i> Mis Citas
            </a>
          </li>
          @endif



        </ul>