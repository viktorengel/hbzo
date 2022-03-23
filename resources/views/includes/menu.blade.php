<!-- Navigation -->
        <ul class="navbar-nav">
         
                   
         @if(auth()->user()->role == "admin") {{-- admin--}}

          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="ni ni-app text-primary"></i> Menú
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/calif') }}">
              <i class="ni ni-check-bold text-blue"></i>Prueba
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/especialidades') }}">
              <i class="ni ni-check-bold text-blue"></i> Gestion de Especialidad
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctor') }}">
              <i class="ni ni-check-bold text-orange"></i> Gestion de Médicos
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/paciente') }}">
              <i class="ni ni-check-bold text-yellow"></i> Gestion de Pacientes
            </a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="{{ url('/administrador') }}">
              <i class="ni ni-check-bold"></i> Gestion de Admins
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments') }}">
              <i class="ni ni-check-bold text-yellow"></i> Gestion de Citas
            </a>
          </li>


          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/charts/appointments/line') }}">
              <i class="ni ni-check-bold text-info"></i> Frecuencia de Citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/charts/doctors/column') }}">
              <i class="ni ni-check-bold text-pink"></i> Medicos más Activos
            </a>
          </li>

          @elseif(auth()->user()->role == "doctor") {{-- doctor--}}
           <li class="nav-item">
            <a class="nav-link" href="{{ url('/schedule') }}">
              <i class="ni ni-check-bold text-danger"></i> Mis Horarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/paciente') }}">
              <i class="ni ni-check-bold text-blue"></i> Mis Pacientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments') }}">
              <i class="ni ni-check-bold text-yellow"></i> Mis Citas
            </a>
          </li>
        
         @else {{-- patient--}}
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments/create') }}">
              <i class="ni ni-check-bold text-danger"></i> Reservar Cita
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments') }}">
              <i class="ni ni-check-bold text-yellow"></i> Mis Citas
            </a>
          </li>
          @endif
        </ul>