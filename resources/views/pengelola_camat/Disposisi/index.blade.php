@extends('pengelola_camat.layout')
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
                                    <th>Nama Pegawai Camat</th>
                                    <th>No Surat</th>
                                    <th>Tanggal Penyelesaian</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kembali Kepada</th>
                                    <th>Intruksi</th>
                                    <th>Sifat</th>
                                    <th>Tujuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($disposisi as $index => $dsp)
                                @if (substr($dsp->tgl_penyelesaian,5,2) == '01')
                                <?php $hasil_bulan_penyelasian='Januari' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '02')
                                <?php $hasil_bulan_penyelasian='Februari' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '03')
                                <?php $hasil_bulan_penyelasian='Maret' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '04')
                                <?php $hasil_bulan_penyelasian='April' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '05')
                                <?php $hasil_bulan_penyelasian='Mei' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '06')
                                <?php $hasil_bulan_penyelasian='Juni' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '07')
                                <?php $hasil_bulan_penyelasian='Juli' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '08')
                                <?php $hasil_bulan_penyelasian='Agustus' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '09')
                                <?php $hasil_bulan_penyelasian='September' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '10')
                                <?php $hasil_bulan_penyelasian='Oktober' ?>
                                @elseif (substr($dsp->tgl_penyelesaian,5,2) == '11')
                                <?php $hasil_bulan_penyelasian='November' ?>
                                @else
                                <?php $hasil_bulan_penyelasian='Desember' ?>
                                @endif

                                @if (substr($dsp->tgl_kembali,5,2) == '01')
                                <?php $hasil_bulan_kembali='Januari' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '02')
                                <?php $hasil_bulan_kembali='Februari' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '03')
                                <?php $hasil_bulan_kembali='Maret' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '04')
                                <?php $hasil_bulan_kembali='April' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '05')
                                <?php $hasil_bulan_kembali='Mei' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '06')
                                <?php $hasil_bulan_kembali='Juni' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '07')
                                <?php $hasil_bulan_kembali='Juli' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '08')
                                <?php $hasil_bulan_kembali='Agustus' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '09')
                                <?php $hasil_bulan_kembali='September' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '10')
                                <?php $hasil_bulan_kembali='Oktober' ?>
                                @elseif (substr($dsp->tgl_kembali,5,2) == '11')
                                <?php $hasil_bulan_kembali='November' ?>
                                @else
                                <?php $hasil_bulan_kembali='Desember' ?>
                                @endif
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$dsp->nama_pegawai_camat}}</td>
                                    <td>{{$dsp->id_kode_surat}}</td>
                                    <td>{{substr($dsp->tgl_penyelesaian,0,2)}} {{$hasil_bulan_penyelasian}} {{substr($dsp->tgl_penyelesaian,0,4)}}</td>
                                    <td>{{substr($dsp->tgl_kembali,0,2)}} {{$hasil_bulan_kembali}} {{substr($dsp->tgl_kembali,0,4)}}</td>
                                    <td>{{$dsp->kembali_kepada}}</td>
                                    <td>{{$dsp->intruksi}}</td>
                                    <td>{{$dsp->sifat}}</td>
                                    <td>{{$dsp->tujuan}}</td>
                                    <td>
                                        <form action="{{ route('disposisi.destroy',$dsp->id_disposisi) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('disposisi.edit',$dsp->id_disposisi) }}">Edit</a>
                                            <a class="btn btn-warning" href="{{ route('disposisi.show',$dsp->id_disposisi) }}" >Cetak</a>
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
