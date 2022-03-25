<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $inf->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_cedula') }}
            {{ Form::text('user_cedula', $inf->user_cedula, ['class' => 'form-control' . ($errors->has('user_cedula') ? ' is-invalid' : ''), 'placeholder' => 'User Cedula']) }}
            {!! $errors->first('user_cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha_de Diagnóstico') }}
            {{ Form::date('fecha_diag', $inf->fecha_diag, ['class' => 'form-control' . ($errors->has('fecha_diag') ? ' is-invalid' : ''), 'placeholder' => 'Fecha_de Diagnóstico']) }}
            {!! $errors->first('fecha_diag', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_enfermedad') }}
            {{ Form::text('nombre_enf', $inf->nombre_enf, ['class' => 'form-control' . ($errors->has('nombre_enf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Enfermedad']) }}
            {!! $errors->first('nombre_enf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obs_cliente') }}
            {{ Form::text('obs_cli', $inf->obs_cli, ['class' => 'form-control' . ($errors->has('obs_cli') ? ' is-invalid' : ''), 'placeholder' => 'Obs Cliente']) }}
            {!! $errors->first('obs_cli', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha de registro') }}
            {{ Form::date('fecha_reg', $inf->fecha_reg, ['class' => 'form-control' . ($errors->has('fecha_reg') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Registro']) }}
            {!! $errors->first('fecha_reg', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::textarea('observaciones', $inf->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>