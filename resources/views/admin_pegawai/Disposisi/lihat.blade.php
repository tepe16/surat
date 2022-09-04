@extends('admin_pegawai.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Disposisi</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>No Surat</th>
                                    <th>Jenis  Surat</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Bagian</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Terima</th>
                                    <th>Perihal</th>
                                    <th>Sifat</th>
                                    <th>Rahasia</th>
                                    <th>Tujuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($disposisi as $index => $dsp)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$dsp->nama_pegawai}}</td>
                                    <td>{{$dsp->no_surat}}</td>
                                    <td>{{$dsp->nama_jenis}}</td>
                                    <td>{{$dsp->nama_instansi}}</td>
                                    <td>{{$dsp->nama_bagian}}</td>
                                    <td>{{$dsp->tgl_surat}}</td>
                                    <td>{{$dsp->tgl_terima}}</td>
                                    <td>{{$dsp->perihal}}</td>
                                    <td>{{$dsp->sifat}}</td>
                                    <td>{{$dsp->rahasia}}</td>
                                    <td>{{$dsp->tujuan}}</td>
                                    <td>
                                        <form action="{{ route('disposisi.destroy',$dsp->id_disposisi) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('disposisi.edit',$dsp->id_disposisi) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $disposisi->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection