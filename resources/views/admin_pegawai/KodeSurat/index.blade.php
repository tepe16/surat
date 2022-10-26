@extends('admin_pegawai.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kode Surat</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Surat</th>
                                    <th>Nama Surat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kodes as $index => $kode)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$kode->id_kode_surat}}</td>
                                    <td>{{$kode->nama_kode_surat}}</td>
                                    <td>
                                        <form action="{{ route('kode.destroy',$kode->id_kode_surat) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('kode.edit',$kode->id_kode_surat) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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