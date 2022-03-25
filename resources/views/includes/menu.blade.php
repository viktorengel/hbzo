<!-- Navigation -->
        <ul class="navbar-nav">
         
                   
         @if(auth()->user()->role == "admin") {{-- admin--}}

          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="ni ni-app text-primary"></i> Menú
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('/libros') }}">
              <i class="ni ni-check-bold text-blue"></i>Libros
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/clientes') }}">
              <i class="ni ni-check-bold text-blue"></i>Clientes
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/cursos') }}">
              <i class="ni ni-check-bold text-blue"></i>Cursos
            </a>
          </li> -->

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
            <a class="nav-link" href="{{ url('/reportecalificacion') }}">
              <i class="ni ni-time-alarm text-yellow"></i> Reporte Calificacion
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
<<<<<<< HEAD
            <a class="nav-link" href="{{ url('/paciente') }}">
              <i class="ni ni-check-bold text-blue"></i> Mis Pacientes
=======
            <a class="nav-link" href="{{ url('/pacientes') }}">
              <i class="ni ni-time-alarm text-blue"></i> Mis Pacientes
>>>>>>> 1401c39da0240f386cf6b1bcd4c2b12e82a84fce
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

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/calificacion') }}">
              <i class="ni ni-time-alarm text-yellow"></i> Calificacion
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/enfermedades') }}">
              <i class="ni ni-check-bold text-blue"></i>Registro de enfermedades
            </a>
          </li>
          @endif
        </ul>