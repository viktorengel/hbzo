@extends('layouts.panel')

@section('template_title')
    {{ $enfermedade->name ?? 'Mostrar Enfermedade' }}
@endsection

@section('content')

    <div class="header bg-gradient-success pb-6 pt-3 pt-md-6">
        
    </div>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Enfermedade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('enfermedades.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha Diag:</strong>
                            {{ $enfermedade->fecha_diag }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Enf:</strong>
                            {{ $enfermedade->nombre_enf }}
                        </div>
                        <div class="form-group">
                            <strong>Obs Cli:</strong>
                            {{ $enfermedade->obs_cli }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Reg:</strong>
                            {{ $enfermedade->fecha_reg }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $enfermedade->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
