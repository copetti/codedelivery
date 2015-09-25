<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @if ($errors->has('name'))
        <p class="help-block">{{ $errors->first('name') }}</p>
    @endif
</div>