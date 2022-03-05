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
                  <h3 class="mb-0 btnagregar">Reporte:Medicos mas activos</h3>
                   
                </div>
              </div>
            </div>
           <div class="card-body">
            <div class="input-daterange datepicker row align-items-center"
        data-date-format="yyyy-mm-dd">
          <div class="col">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control" id="startDate"
                        placeholder="Fecha de inicio" type="text" value="{{ $start }}">
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control" id="endDate"
                        placeholder="Fecha de fin" type="text" value="{{ $end }}">
                  </div>
              </div>
          </div>
      </div>
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
  <script src="{{ asset('js/charts/doctors.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>
<script>
  $('.datepicker').datepicker({
    language: 'es'
});

</script>
@endsection
