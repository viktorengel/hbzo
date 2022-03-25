@extends('layouts.panel')

@section('template_title')
    Create Enfermedade
@endsection

@section('content')

<div class="header bg-gradient-success pb-6 pt-3 pt-md-6">
     
    </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Registro de Enfermedades preexistentes</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('enfermedades.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('enfermedade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
