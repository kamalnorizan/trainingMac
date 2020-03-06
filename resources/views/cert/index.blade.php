@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Certificates <a href="/cert/create"
                        class="btn btn-primary btn-sm float-right">Tambah</a></div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                IC Ibu
                            </td>
                            <td>
                                IC Bapa
                            </td>
                            <td>
                                Tindakan
                            </td>
                        </tr>
                        @foreach ($certs as $cert)
                        <tr>
                            <td>
                                {{$cert->name}}
                            </td>
                            <td>
                                {{$cert->childOfMother->name}} <br>
                                @foreach ($cert->childOfMother->motherOf as $child)
                                - {{$child->name}} bin/binti {{$child->childOfFather->name}} <br>
                                @endforeach
                            </td>
                            <td>
                                {{$cert->childOfFather->name}}
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['cert.destroy',$cert->id],
                                'onsubmit'=>'return confirm("Are you sure?")']) !!}
                                <a href="/cert/{{$cert->id}}/edit" class="btn btn-info btn-sm">Kemaskini</a>
                                {!! Form::submit("Delete", ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {{ $certs->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
