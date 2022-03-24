@extends('layouts.panel')

@section('template_title')
    {{ $curso->name ?? 'Mostrar Curso' }}
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
                            <span class="card-title">Mostrar Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $curso->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Desc:</strong>
                            {{ $curso->Desc }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $curso->Valor }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $curso->Fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
