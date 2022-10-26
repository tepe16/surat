@extends('admin_pegawai.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">TAMBAH DATA AGENDA</h4></br>
                @if ($errors->any())
                     <div class="alert alert-danger">
                         <strong>Whoops!</strong> There were some problems with your input.<br><br>
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                @endif
                <form action="{{ route('agenda.update', $agendas->id_agenda) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Tanggal Agenda</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_agenda" value="{{$agendas->tgl_agenda}}" required/>
                                    <input type="hidden" class="form-control" name="id_pegawai" value="{{ Auth::guard('pgw')->user()->id_pegawai }}" >
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Isi Acara</b></label></br></br>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="isi_acara"  required/>{{$agendas->isi_acara}}</textarea>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Peserta</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="peserta" value="{{$agendas->peserta}}" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tempat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tempat" value="{{$agendas->tempat}}" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Waktu</b></label></br></br>
                                <div class="form-group">
                                    <input type="time" class="form-control" name="waktu" min="00:00" max="23:59" value="{{$agendas->waktu}}" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-left">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection