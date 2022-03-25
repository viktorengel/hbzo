<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $enfPre->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_cedula') }}
            {{ Form::text('user_cedula', $enfPre->user_cedula, ['class' => 'form-control' . ($errors->has('user_cedula') ? ' is-invalid' : ''), 'placeholder' => 'User Cedula']) }}
            {!! $errors->first('user_cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_diag') }}
            {{ Form::text('fecha_diag', $enfPre->fecha_diag, ['class' => 'form-control' . ($errors->has('fecha_diag') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Diag']) }}
            {!! $errors->first('fecha_diag', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_enf') }}
            {{ Form::text('nombre_enf', $enfPre->nombre_enf, ['class' => 'form-control' . ($errors->has('nombre_enf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Enf']) }}
            {!! $errors->first('nombre_enf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obs_cli') }}
            {{ Form::text('obs_cli', $enfPre->obs_cli, ['class' => 'form-control' . ($errors->has('obs_cli') ? ' is-invalid' : ''), 'placeholder' => 'Obs Cli']) }}
            {!! $errors->first('obs_cli', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_reg') }}
            {{ Form::text('fecha_reg', $enfPre->fecha_reg, ['class' => 'form-control' . ($errors->has('fecha_reg') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Reg']) }}
            {!! $errors->first('fecha_reg', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $enfPre->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>