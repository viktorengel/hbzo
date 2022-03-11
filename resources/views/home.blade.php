@extends('layouts.panel')


@section('subtitle','Dashboard')

@section('content')

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            @if($role=='admin')
            {{-- @include('home.card') --}}
            @endif
           

          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid mt--7">
      
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Próximas Citas</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/appointments') }}" class="btn btn-sm btn-primary">Ver Todo</a>
                </div>
              </div>
            </div>
           
           @include('appointments.tables.confirmed')
         
          </div>
        </div>

      </div>
      <!-- Footer -->
      @include('includes.footer')
    </div>
@endsection
