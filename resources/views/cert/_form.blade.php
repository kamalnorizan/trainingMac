<div class="form-group{{ $errors->has('cert_num') ? ' has-error' : '' }}">
    {!! Form::label('cert_num', 'No. Sijil') !!}
    {!! Form::text('cert_num', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('cert_num') }}</small>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nama') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="form-group{{ $errors->has('date_birth') ? ' has-error' : '' }}">
    {!! Form::label('date_birth', 'Tarikh Lahir') !!}
    {!! Form::date('date_birth', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('date_birth') }}</small>
</div>
