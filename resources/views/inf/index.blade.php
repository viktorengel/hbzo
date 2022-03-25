@extends('layouts.panel')

@section('template_title')
    Inf
@endsection

@section('content')

<div class="header bg-gradient-success pb-6 pt-3 pt-md-6">
     
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enfermedades preexistentes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('infs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive"  id="imprimible">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>User Id</th>
										<th>User Cedula</th>
										<th>Fecha Diagnostico</th>
										<th>Nombre Enfermedad</th>
										<th>Obs Cliente</th>
										<th>Fecha Registro</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infs as $inf)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ Auth::user()->name }}</td>
											<td>{{ Auth::user()->cedula }}</td>
											<td>{{ $inf->fecha_diag }}</td>
											<td>{{ $inf->nombre_enf }}</td>
											<td>{{ $inf->obs_cli }}</td>
											<td>{{ $inf->fecha_reg }}</td>
											<td>{{ $inf->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('infs.destroy',$inf->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('infs.edit',$inf->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $infs->links() !!}
            </div>
        </div>
    </div>
    <script>
    function imprimirElemento(elemento){
        var ventana = window.open('','PRINT','height=1024,width=768');
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
