@extends('layouts.panel')

@section('template_title')
    Update Enfermedade
@endsection

@section('content')

<div class="header bg-gradient-success pb-6 pt-3 pt-md-6">
     
    </div>

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualización de Enfermedades</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('enfermedades.update', $enfermedade->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('enfermedade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
