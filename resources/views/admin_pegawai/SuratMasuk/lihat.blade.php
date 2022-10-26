@extends('admin_pegawai.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Surat Masuk</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Kode Surat</th>
                                    <th>Nama  Surat</th>
                                    <th>Tanggal masuk </th>
                                    <th>Asal Surat</th>
                                    <th>Perihal</th>
                                    <th>Lembar Surat</th>
                                    <th>Lampiran</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surat_masuk as $index => $surat)
                                @if (substr($surat->tgl_masuk,5,2) == '01')
                                <?php $hasil_bulan='Januari' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '02')
                                <?php $hasil_bulan='Februari' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '03')
                                <?php $hasil_bulan='Maret' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '04')
                                <?php $hasil_bulan='April' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '05')
                                <?php $hasil_bulan='Mei' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '06')
                                <?php $hasil_bulan='Juni' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '07')
                                <?php $hasil_bulan='Juli' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '08')
                                <?php $hasil_bulan='Agustus' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '09')
                                <?php $hasil_bulan='September' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '10')
                                <?php $hasil_bulan='Oktober' ?>
                                @elseif (substr($surat->tgl_masuk,5,2) == '11')
                                <?php $hasil_bulan='November' ?>
                                @else
                                <?php $hasil_bulan='Desember' ?>
                                @endif
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$surat->nama_pegawai}}</td>
                                    <td>{{$surat->id_kode_surat}}</td>
                                    <td>{{$surat->nama_kode_surat}}</td>
                                    <td>{{substr($surat->tgl_masuk,0,2)}} {{$hasil_bulan}} {{substr($surat->tgl_masuk,0,4)}}</td>
                                    <td>{{$surat->asal_surat}}</td>
                                    <td>{{$surat->perihal}}</td>
                                    <td>{{$surat->lembar_surat}}</td>
                                    <td>{{$surat->lampiran}}</td>
                                    <td>{{$surat->file}}</td>
                                    <td>
                                        <form action="{{ route('suratmasuk.destroy',$surat->id_surat_masuk) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('suratmasuk.edit',$surat->id_surat_masuk) }}">Edit</a>
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
                        {!! $surat_masuk->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection