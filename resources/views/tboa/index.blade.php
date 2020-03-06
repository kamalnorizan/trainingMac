@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Mohon Baru</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'tboa.store']) !!}

                    <div class="form-group{{ $errors->has('cert_num') ? ' has-error' : '' }}">
                        {!! Form::label('cert_num', 'No Sijil Lahir') !!}
                        {!! Form::text('cert_num', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('cert_num') }}</small>
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
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Online Cert Application</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>
                                No Sijil
                            </td>
                            <td>
                                Nama
                            </td>
                            <td>
                                Tarikh Mohon
                            </td>
                            <td>
                                Status
                            </td>
                        </tr>
                        @foreach ($tboas as $tboa)
                        <tr>
                            <td>
                                {{$tboa->cert->cert_num}}
                            </td>
                            <td>
                                {{$tboa->cert->name}}

                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($tboa->created_at)->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$tboa->status}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
