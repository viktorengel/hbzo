@extends('layouts.panel')

@section('template_title')
    {{ $inf->name ?? 'Mostrar Inf' }}
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
                            <span class="card-title">Mostrar Enfermedades</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('infs.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $inf->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Cedula:</strong>
                            {{ $inf->user_cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Diag:</strong>
                            {{ $inf->fecha_diag }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Enf:</strong>
                            {{ $inf->nombre_enf }}
                        </div>
                        <div class="form-group">
                            <strong>Obs Cli:</strong>
                            {{ $inf->obs_cli }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Reg:</strong>
                            {{ $inf->fecha_reg }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $inf->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
