@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $cliente->valor }}
                        </div>
                        <div class="form-group">
                            <strong>Dinero:</strong>
                            {{ $cliente->dinero }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $cliente->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
