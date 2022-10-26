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
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Agenda</th>
                                    <th>Isi Acara</th>
                                    <th>Peserta</th>
                                    <th>Tempat</th>
                                    <th>Waktu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $index => $agenda)
                                @if (substr($agenda->tgl_agenda,5,2) == '01')
                                <?php $hasil_bulan='Januari' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '02')
                                <?php $hasil_bulan='Februari' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '03')
                                <?php $hasil_bulan='Maret' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '04')
                                <?php $hasil_bulan='April' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '05')
                                <?php $hasil_bulan='Mei' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '06')
                                <?php $hasil_bulan='Juni' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '07')
                                <?php $hasil_bulan='Juli' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '08')
                                <?php $hasil_bulan='Agustus' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '09')
                                <?php $hasil_bulan='September' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '10')
                                <?php $hasil_bulan='Oktober' ?>
                                @elseif (substr($agenda->tgl_agenda,5,2) == '11')
                                <?php $hasil_bulan='November' ?>
                                @else
                                <?php $hasil_bulan='Desember' ?>
                                @endif
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$agenda->nama_pegawai}}</td>
                                    <td>{{substr($agenda->tgl_agenda,0,2)}} {{$hasil_bulan}} {{substr($agenda->tgl_agenda,0,4)}}</td>
                                    <td>{{$agenda->isi_acara}}</td>
                                    <td>{{$agenda->peserta}}</td>
                                    <td>{{$agenda->tempat}}</td>
                                    <td>{{$agenda->waktu}}</td>
                                    <td>
                                        <form action="{{ route('agenda.destroy',$agenda->id_agenda) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('agenda.edit',$agenda->id_agenda) }}">Edit</a>
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