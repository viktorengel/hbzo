        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ asset('img/theme/react.jpg') }}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              
              @if(Auth::user()->role=='patient')
               <a href="{{url('/perfil/paciente')}}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              @endif

               @if(Auth::user()->role=='doctor')
               <a href="{{url('/perfil/doctor')}}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              @endif


              <a href="{{ url('/appointments') }}" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span> Mis Citas</span>
              </a>

              <a href="#" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span> Ayuda</span>
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="dropdown-item">
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
                  </form>
                <i class="ni ni-user-run"></i>
                <span>Salir</span>
              </a>
            </div>
          </li>
