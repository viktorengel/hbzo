<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Fecha Diagnóstico') }}
            {{ Form::date('fecha_diag', $enfermedade->fecha_diag, ['class' => 'form-control' . ($errors->has('fecha_diag') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Diagnóstico']) }}
            {!! $errors->first('fecha_diag', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre Enfermedad') }}
            {{ Form::text('nombre_enf', $enfermedade->nombre_enf, ['class' => 'form-control' . ($errors->has('nombre_enf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Enfermedad']) }}
            {!! $errors->first('nombre_enf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Observación Cliente') }}
            {{ Form::text('obs_cli', $enfermedade->obs_cli, ['class' => 'form-control' . ($errors->has('obs_cli') ? ' is-invalid' : ''), 'placeholder' => 'Observación Cliente']) }}
            {!! $errors->first('obs_cli', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Registro') }}
            {{ Form::date('fecha_reg', $enfermedade->fecha_reg, ['class' => 'form-control' . ($errors->has('fecha_reg') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Registro']) }}
            {!! $errors->first('fecha_reg', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Observaciones') }}
            {{ Form::text('observaciones', $enfermedade->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>