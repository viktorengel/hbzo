@extends('layouts.app')

@section('template_title')
    {{ $calif->name ?? 'Show Calif' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Calif</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('califs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Medico:</strong>
                            {{ $calif->medico }}
                        </div>
                        <div class="form-group">
                            <strong>Calificacion:</strong>
                            {{ $calif->calificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Patient Id:</strong>
                            {{ $calif->patient_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
