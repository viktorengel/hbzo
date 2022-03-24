@extends('layouts.panel')

@section('title','Especialidad')


@section('subtitle','Especialidades')

@section('content')

<div class="header bg-gradient-primary pb-6 pt-3 pt-md-6">
     
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Libro') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('libros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <h3 class="mb-0 btnagregar ">
                        <button id="btnImprimir" class="btn btn-sm btn-success"><i class="fas fa-plus-circle " ></i> Descargar reporte</button>
                    </h3>

                    <div class="card-body"  >
                        <div class="table-responsive"  id="imprimible" >
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libros as $libro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $libro->nombre }}</td>
											<td>{{ $libro->precio }}</td>

                                            <td>
                                                <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('libros.show',$libro->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('libros.edit',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $libros->links() !!}
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