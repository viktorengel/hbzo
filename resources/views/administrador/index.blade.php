@extends('layouts.panel')


@section('subtitle','administrador')

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
                  <h3 class="mb-0 btnagregar">Administradores  <a href="{{ url('administrador/create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus-circle " ></i> Agregar</a></h3>
                   
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
                    <th scope="col">CédulaC</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($administrador as $adm)
               <tr>
                    <th scope="row">
                      {{ $adm->name }}
                    </th>
                    <td>
                     {{ $adm->email }}
                    </td>

                     <td>
                      {{ $adm->cedula }}
                    </td>
                    
                    <td>                   
                        <form action="{{ url('/administrador/'.$adm->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{ url('/administrador/'.$adm->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                          <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                     
                    </td>
                  </tr> 
                  @endforeach              
                </tbody>
              </table>

              
              <!-- PAGINACION -->
              {{ $administrador->links() }}
         


            </div>
            

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection


