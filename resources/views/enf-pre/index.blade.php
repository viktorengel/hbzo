@extends('layouts.app')

@section('template_title')
    Enf Pre
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enf Pre') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('enf-pres.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>User Id</th>
										<th>User Cedula</th>
										<th>Fecha Diag</th>
										<th>Nombre Enf</th>
										<th>Obs Cli</th>
										<th>Fecha Reg</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enfPres as $enfPre)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ Auth::user()->name }}</td>
											<td>{{ Auth::user()->cedula }}</td>
											<td>{{ $enfPre->fecha_diag }}</td>
											<td>{{ $enfPre->nombre_enf }}</td>
											<td>{{ $enfPre->obs_cli }}</td>
											<td>{{ $enfPre->fecha_reg }}</td>
											<td>{{ $enfPre->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('enf-pres.destroy',$enfPre->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('enf-pres.show',$enfPre->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('enf-pres.edit',$enfPre->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $enfPres->links() !!}
            </div>
        </div>
    </div>
@endsection
