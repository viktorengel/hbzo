@extends('layouts.form')
@section('title','registrarse')
@section('content')
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
           
                <div class="header-body text-center mb-2">
                  <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                      <h1 class="text-black">Registrarse!</h1>
                    </div>
                  </div>
                </div>

              
              @if($errors->any())
              <div class="text-center text-muted mb-4">
                <small class="text-black">Ops se encontro un error.</small>
              </div>

              <div class="alert alert-danger" role="alert">
                  {{ $errors->first() }}
              </div>

              @else
              <div class="text-center text-muted mb-4">
                <small class="text-black">Ingresar datos para crear cuenta</small>
              </div>
              @endif

              <form role="form" method="POST" action="{{ route('register') }}">
                 @csrf

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingresar Nombre">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input placeholder="Ingresar Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input placeholder="Ingresar Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input placeholder="Confirmar Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>

               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Registrar</button>
                </div>
              </form>
            </div>
          </div>

           <div class="row mt-3">
            <div class="col-6">
              <a href="{{ route('password.request') }}" class="text-light">
                <small>¿olvidaste tu contraseña?</small>
                </a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('login') }}" class="text-light">
                <small>¿Ya tienes una Cuenta?</small>
            </a>
            </div>
          </div>

        </div>
      </div>
    </div>
@endsection
