@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Certificates <a href="/cert/create" class="btn btn-primary btn-sm float-right">Tambah</a></div>

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
                                {{$cert->ic_ibu}}
                            </td>
                            <td>
                                {{$cert->ic_bapa}}
                            </td>
                            <td>
                            <a href="/cert/{{$cert->id}}/edit" class="btn btn-info btn-sm">Kemaskini</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $certs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
