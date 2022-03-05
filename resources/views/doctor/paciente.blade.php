@extends('layouts.panel')

@section('title','Mis Pacientes')

@section('subtitle','Mis Pacientes')

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
                  <h3 class="mb-0 btnagregar">Mis Paciente </h3>
                   
                </div>
              </div>
            </div>

            

            <div class="table-responsive listaregistros">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">CédulaC</th>
                    <th scope="col">PHONE</th>
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
                      {{ $pac->phone }}
                    </td>
                   
                  </tr> 
                  @endforeach              
                </tbody>
              </table>

              {{ $paciente->links() }}

            </div>
            

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection


