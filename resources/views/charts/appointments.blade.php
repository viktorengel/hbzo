@extends('layouts.panel')


@section('subtitle','Medicos')

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
                  <h3 class="mb-0 btnagregar">Reporte:Precuencia de Citas</h3>
                   
                </div>
              </div>
            </div>
           <div class="card-body">
             <div id="container"></div>
           </div>
        
         
            

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection

@section('scripts')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script>
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Citas registradas mensualmente'
        },
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        },
        yAxis: {
            title: {
                text: 'Cantidad de citas'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Citas registradas',
            data: @json($counts)
        }]
    });
  </script>
@endsection
