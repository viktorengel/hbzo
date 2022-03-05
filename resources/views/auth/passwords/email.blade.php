@extends('layouts.form')
@section('title','Restablecer la contraseña')

@section('content')

<div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              

              <div class="header-body text-center mb-2">
                  <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                      <h1 class="text-black">Restablecer la contraseña</h1>
                    </div>
                  </div>
                </div>

              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                   

              <form role="form" method="POST" action="{{ route('password.email') }}">
                 @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                  </div>
                </div>



                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-3">Enviar enlace de restablecimiento</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{ route('login') }}" class="text-light">
                <small>¿Ya tienes una Cuenta?</small>
                </a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('register') }}" class="text-light">
                <small>¿Aun no tienes cuenta?</small>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
