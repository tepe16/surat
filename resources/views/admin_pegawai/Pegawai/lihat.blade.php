@extends('admin_pegawai.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pegawai</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pegawai as $index => $pgw)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$pgw->nama_pegawai}}</td>
                                    <td>{{$pgw->nip}}</td>
                                    <td>{{$pgw->username}}</td>
                                    <td>
                                        <form action="#" method="POST">
                                            <a class="btn btn-primary" href="{{ route('settingpegawai.edit',$pgw->id_pegawai) }}">Edit</a>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection