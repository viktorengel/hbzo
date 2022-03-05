@extends('layouts.panel')

@section('title','Paciente')

@section('subtitle','Paciente')

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
                  <h3 class="mb-0 btnagregar">Paciente  <a href="{{ url('paciente/create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus-circle " ></i> Agregar</a></h3>
                   
                </div>
              </div>
            </div>

            @if(Session::has('notification'))
                        <div class="alert alert-success">
                            {{ Session::get('notification') }}
                            @php
                                Session::forget('notification');
                            @endphp
                        </div>
            @endif
            <br>

            <div class="table-responsive listaregistros">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">cedula</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($paciente as $pac)
               <tr>
                    <th scope="row">
                      {{ $pac->name }}
                    </th>
                    <td>
                     {{ $pac->email }}
                    </td>

                     <td>
                      {{ $pac->cedula }}
                    </td>
                    
                    <td>                   
                        <form action="{{ url('/paciente/'.$pac->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/paciente/'.$pac->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                          <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                     
                    </td>
                  </tr> 
                  @endforeach              
                </tbody>
              </table>

              
              <!-- PAGINACION -->
              <!-- PAGINACION -->
              {{ $paciente->links() }}
            {{--   <div class="d-flex justify-content-center" style="margin-top: 10px;">
       @if ($paciente->lastPage() > 1)   
        <nav aria-label="...">

        <ul class="pagination">
          <li class="page-item {{ ($paciente->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paciente->url($paciente->currentPage()-1) }}">
              <i class="fa fa-angle-left"></i>
            </a>
          </li>

           @for ($i = 1; $i <= $paciente->lastPage(); $i++)
               <li class="page-item {{ ($paciente->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $paciente->url($i) }}"> {{ $i }}<span class="sr-only">(current)</span></a>
              </li>

            @endfor
          <li class="page-item {{ ($paciente->currentPage()==$paciente->lastPage())?'disabled':''}}">
            <a class="page-link  " href="{{ $paciente->url($paciente->currentPage()+1) }}">
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
      </nav>
      @endif      

      </div> --}}


            </div>
            

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection


