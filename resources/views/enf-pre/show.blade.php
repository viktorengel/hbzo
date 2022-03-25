@extends('layouts.app')

@section('template_title')
    {{ $enfPre->name ?? 'Mostrar Enf Pre' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Enf Pre</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('enf-pres.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $enfPre->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Cedula:</strong>
                            {{ $enfPre->user_cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Diag:</strong>
                            {{ $enfPre->fecha_diag }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Enf:</strong>
                            {{ $enfPre->nombre_enf }}
                        </div>
                        <div class="form-group">
                            <strong>Obs Cli:</strong>
                            {{ $enfPre->obs_cli }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Reg:</strong>
                            {{ $enfPre->fecha_reg }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $enfPre->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
