@extends('layouts.panel')

@section('template_title')
    Enfermedade
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
                                {{ __('Enfermedade') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('enfermedades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha de Diagnóstico</th>
										<th>Nombre Enfermedad</th>
										<th>Obs. Cliente</th>
										<th>Fecha de Registro</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enfermedades as $enfermedade)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $enfermedade->fecha_diag }}</td>
											<td>{{ $enfermedade->nombre_enf }}</td>
											<td>{{ $enfermedade->obs_cli }}</td>
											<td>{{ $enfermedade->fecha_reg }}</td>
											<td>{{ $enfermedade->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('enfermedades.destroy',$enfermedade->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('enfermedades.edit',$enfermedade->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $enfermedades->links() !!}
            </div>
        </div>
    </div>
@endsection
