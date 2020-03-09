@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengurusan Pengguna<a class="btn btn-primary btn-sm float-right" data-toggle="modal" href='#create-role'>Create Role</a></div>

                <div class="card-body">
                    {{-- table.table>tr*2>td*3 --}}
                   <table class="table">
                       <tr>
                           <td>
                               Nama
                           </td>
                           <td>
                               Role
                           </td>
                           <td>
                               Permission
                           </td>
                           <td>
                               Tindakan
                           </td>
                       </tr>
                       @foreach ($users as $user)
                       <tr>
                           <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->roles}}
                            </td>
                            <td>
                                {{$user->permissions}}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" data-toggle="modal" href='#assign-role'>Assign Role</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="create-role">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {!! Form::open(['method' => 'POST', 'url' => '/user/createrole']) !!}
            <div class="modal-body">
                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    {!! Form::label('role', 'Role Name') !!}
                    {!! Form::text('role', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('role') }}</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<div class="modal fade" id="assign-role">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {!! Form::open(['method' => 'POST', 'url' => '/user/assignrole']) !!}
            <div class="modal-body">

                    <div class="form-group{{ $errors->has('roles[]') ? ' has-error' : '' }}">
                        {!! Form::label('roles[]', 'Roles') !!}
                        {!! Form::select('roles[]', $roles, null, ['id' => 'roles[]', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
                        <small class="text-danger">{{ $errors->first('roles[]') }}</small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create Role</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

