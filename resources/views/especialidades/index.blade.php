@extends('layouts.panel')

@section('title','Especialidad')


@section('subtitle','Especialidades')

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
                  <h3 class="mb-0 btnagregar">Especialidades  <a href="javascript:void(0)" onclick="mostrarform(true)" class="btn btn-sm btn-success"><i class="fas fa-plus-circle " ></i> Agregar</a></h3>
                   
                </div>
              </div>
            </div>
            <div class="table-responsive listaregistros">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">estado</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($especialidades as $esp)
					 <tr>
                    <th scope="row">
                      {{ $esp->name }}
                    </th>
                    <td>
                     {{ $esp->description }}
                    </td>
                    <td >
                    <label class="custom-toggle">
                    	<form action="{{ url('/especialidades/'.$esp->id) }}" id="form-estado{{$esp->id}}" method="post">
                    	@csrf
                     @method('PUT')
                      <input type="hidden" name="estado" value="{{($esp->estado==1)?'0':'1'}}">
                    <input type="checkbox" {{ $esp->estado==1 ? 'checked' :"" }}
                    	  />
        					    <span class="custom-toggle-slider rounded-circle" onclick="event.preventDefault();
                                                     document.getElementById('form-estado<?php echo $esp->id; ?>').submit();"></span>	
                        </form>

        					</label>
                    </td>
                    <td>
                     <a  href="javascript:void(0)" onclick="mostrar(<?php echo $esp->id; ?>)"><i class="fas fa-edit" style="color: blue; font-size: 16px; cursor: pointer;"></i></a>
                     
                     <a href="javascript:void(0)" onclick="eliminar(<?php echo $esp->id; ?>)"><i class="fas fa-trash-alt" style="margin-left: 10px;color: red;font-size: 16px;cursor: pointer;"></i></a>
                    
                     <form id="delete-form" method="post" class="d-none">

                     @csrf
                     @method('DELETE')
                  </form>

                     
                    </td>
                  </tr> 
                  @endforeach              
                </tbody>
              </table>

              
              <!-- PAGINACION -->
		            <div class="card-body">
               {{ $especialidades->links() }}
             </div>

            </div>
            

            <div class="panel-body formregistros">
            	
            	<form action="{{ url('especialidades') }}" method="post" id="formespecialidad">
            		@csrf
            		<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="id" id="id" value="0">
                            <input type="text" class="form-control" id="nombre" name="name" maxlength="100" placeholder="Nombre" required value="{{ old('name') }}" />
                             <span class="text-danger error-text name_err"></span>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripcion:</label>
                            <input type="text" class="form-control" id="descripcion" name="description" maxlength="100" placeholder="Descripcion">
                             <span class="text-danger error-text description_err"></span>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                  <button class="btn  btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar </button>

			                  <button class="btn  btn-danger" type="button" onclick="mostrarform(false)"><i class="fa fa-save"></i> Cancelar </button>
			                  
			                </div>
            	</form>
             				


            </div>

          </div>
        </div>


      </div>

      <!-- Footer -->
      @include('includes.footer')
    </div>

    <script src="{{ asset('js/especialidad.js') }}"></script>

@endsection


