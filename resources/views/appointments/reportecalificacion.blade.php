@extends('layouts.panel')

@section('title','Reporte Calificaciones')

@section('subtitle','Reporte Calificaciones')

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
                  
                  <h3 class="mb-0 btnagregar">
                    
                   <button id="btnImprimir" class="btn btn-sm btn-success"><i class="fas fa-plus-circle " ></i> Descargar reporte</button>
                
                  </h3>
                
                   
                </div>
              </div>
            </div>
          </div> 

          {{-- Listar --}}

          <div class="table-responsive" id="imprimible">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Id Paciente</th>
                    <th scope="col">Fecha </th>
                    <th scope="col">Calificación</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($oldAppointments as $appointment)
                <tr>
                  <th scope="row">
                    {{ $appointment->id }}
                  </th>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->patient_id }}</td>
                  <td>
                    {{ $appointment->scheduled_date }}
                  </td>
                  <td>
                    {{ $appointment->calificacion }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
          <div class="card-body">   
            {{ $oldAppointments->links() }}
          </div>

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>



    <script>
        function imprimirElemento(elemento){
            var ventana = window.open('','PRINT','height=400,width=600');
            ventana.document.write('<html><head><title>'+ document.title+ '</title>');
            ventana.document.write('<link rel="stylesheet" href="imprimir.css">'); //Cargamos otra hoja, no la normal
            ventana.document.write('</head><body >');
            ventana.document.write(elemento.innerHTML);
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.print();
            ventana.close();
            return true;
    }
        document.querySelector("#btnImprimir").addEventListener("click",function(){
        var div = document.querySelector("#imprimible");
        imprimirElemento(div);
    });

    
    </script>

@endsection


