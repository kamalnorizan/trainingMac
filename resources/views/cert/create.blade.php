@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Sijil</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'cert.store']) !!}

                        @include('cert._form')
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

