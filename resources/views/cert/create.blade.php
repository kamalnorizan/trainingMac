@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Sijil</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'cert.store']) !!}

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
                        <div class="form-group{{ $errors->has('ic_bapa') ? ' has-error' : '' }}">
                            {!! Form::label('ic_bapa', 'IC Bapa') !!}
                            {!! Form::select('ic_bapa',$icPemohon, null, ['id' => 'ic_bapa', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('ic_bapa') }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('ic_ibu') ? ' has-error' : '' }}">
                            {!! Form::label('ic_ibu', 'IC Ibu') !!}
                            {!! Form::select('ic_ibu',$icPemohon, null, ['id' => 'ic_ibu', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('ic_ibu') }}</small>
                        </div>

                        <div class="btn-group pull-right">
                            {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                            {!! Form::submit("Mohon", ['class' => 'btn btn-success']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

