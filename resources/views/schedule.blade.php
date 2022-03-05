@extends('layouts.panel')

@section('content')

<div class="header bg-gradient-primary pb-6 pt-3 pt-md-6">
     
    </div>
    
    <div class="container-fluid mt--7">
      
      <form action="{{ url('/schedule') }}" method="post">
        @csrf

        <div class="row mt-5">
        <div class="col-xl-12 mb-12 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 btnagregar">Gestionar Horario <button type="submit" class="btn btn-success">Guardar Cambios</button></h3>
                   
                </div>
              </div>
            </div>

             <div class="card-body">
                @if (session('notification'))
                  <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                  </div>
                @endif

                @if (session('errors'))
                  <div class="alert alert-danger" role="alert">
                    Los cambios se han guardado pero tener en cuenta que:
                    <ul>
                    @foreach (session('errors') as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                  </div>
                @endif      
              </div>   

            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Turno Mañana</th>
                    <th scope="col">Turno Tarde</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($workDays as $key => $workDay)
                  <tr>
                    <td>{{$days[$key]}}</td>
                    <td>
                      <label class="custom-toggle">
                     
                    <input type="checkbox" name="active[]" value="{{$key}}" @if($workDay->active) checked @endif />
                      <span class="custom-toggle-slider rounded-circle" ></span> 
                  </label>
                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                          <select name="morning_start[]"  class="form-control">
                            @for ($i=5; $i<=12;$i++)
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                            @if($i.':00 AM' == $workDay->morning_start || $i.':00 PM' == $workDay->morning_start) selected @endif>{{$i}}:00 @if($i==12) PM  @else AM @endif</option>
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:30"
                            @if($i.':30 AM' == $workDay->morning_start || $i.':30 PM' == $workDay->morning_start) selected @endif>{{$i}}:30 @if($i==12) PM  @else AM @endif</option>
                            @endfor
                          </select>

                        </div>
                        <div class="col">
                             <select name="morning_end[]"  class="form-control">
                            @for ($i=5; $i<=12;$i++)
                             <option value="{{ ($i<10 ? '0' : '') . $i }}:00" 
                            @if($i.':00 AM' == $workDay->morning_end || $i.':00 AM' == $workDay->morning_end) selected @endif>{{$i}}:00 @if($i==12) PM  @else AM @endif</option>
                            <option value="{{ ($i<10 ? '0' : '') . $i }}:30"
                            @if($i.':30 AM' == $workDay->morning_end || $i.':30 PM' == $workDay->morning_end) selected @endif>{{$i}}:30 @if($i==12) PM  @else AM @endif </option>
                            @endfor
                          </select>
                        </div>
                      </div>

                    </td>
                    <td>
                      <div class="row">
                        <div class="col">
                          <select name="afternoon_start[]"  class="form-control">
                            @for ($i =1; $i<=6;$i++)
                              <option value="{{ $i+12 }}:00"
                                @if($i.':00 PM' == $workDay->afternoon_start) selected @endif>
                                {{ $i }}:00 PM
                              </option>
                              <option value="{{ $i+12 }}:30"
                                @if($i.':30 PM' == $workDay->afternoon_start) selected @endif>
                                {{ $i }}:30 PM
                              </option>
                            @endfor
                          </select>

                        </div>
                        <div class="col">
                             <select name="afternoon_end[]"  class="form-control">
                            @for ($i =1; $i<=6;$i++)
                             <option value="{{ $i+12 }}:00"
                              @if($i.':00 PM' == $workDay->afternoon_end) selected @endif>
                              {{ $i }}:00 PM
                            </option>
                            <option value="{{ $i+12 }}:30"
                              @if($i.':30 PM' == $workDay->afternoon_end) selected @endif>
                              {{ $i }}:30 PM
                            </option>
                            @endfor
                          </select>
                        </div>
                      </div>
                    </td>
                  </tr>
                   @endforeach
                         
                </tbody>
              </table>

              

              <!-- PAGINACION -->
            

            </div>
         
            

          </div>
        </div>

<script>
  
</script>

      </div>
      </form>
      

      <!-- Footer -->
      @include('includes.footer')
    </div>


@endsection


