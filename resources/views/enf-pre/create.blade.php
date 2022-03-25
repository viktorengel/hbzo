@extends('layouts.app')

@section('template_title')
    Create Enf Pre
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Enf Pre</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('enf-pres.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('enf-pre.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
