<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('medico') }}
            {{ Form::text('medico', $calif->medico, ['class' => 'form-control' . ($errors->has('medico') ? ' is-invalid' : ''), 'placeholder' => 'Medico']) }}
            {!! $errors->first('medico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('calificacion') }}
            {{ Form::text('calificacion', $calif->calificacion, ['class' => 'form-control' . ($errors->has('calificacion') ? ' is-invalid' : ''), 'placeholder' => 'Calificacion']) }}
            {!! $errors->first('calificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('patient_id') }}
            {{ Form::text('patient_id', $calif->patient_id, ['class' => 'form-control' . ($errors->has('patient_id') ? ' is-invalid' : ''), 'placeholder' => 'Patient Id']) }}
            {!! $errors->first('patient_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>