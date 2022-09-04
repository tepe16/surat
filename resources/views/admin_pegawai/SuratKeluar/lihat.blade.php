@extends('admin_pegawai.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Surat Keluar</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>No Surat</th>
                                    <th>Jenis  Surat</th>
                                    <th>Nama Instansi</th>
                                    <th>Tanggal Terima</th>
                                    <th>Perihal</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surat_keluar as $index => $surat)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$surat->nama_pegawai}}</td>
                                    <td>{{$surat->no_surat_keluar}}</td>
                                    <td>{{$surat->nama_jenis}}</td>
                                    <td>{{$surat->nama_instansi}}</td>
                                    <td>{{$surat->tgl_surat}}</td>
                                    <td>{{$surat->perihal}}</td>
                                    <td>{{$surat->file}}</td>
                                    <td>
                                        <form action="{{ route('suratkeluar.destroy',$surat->id_surat_keluar) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('suratkeluar.edit',$surat->id_surat_keluar) }}">Edit</a>
                                            <a class="btn btn-warning" href="{{ route('downloadfile.show',$surat->file) }}" download="{{$surat->file}}">Download</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $surat_keluar->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection