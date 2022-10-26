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
                <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Tanggal Agenda</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control"  data-date-format="DD MMMM YYYY" value="2015-08-09" name="tgl_agenda" placeholder="Masukan Tanggal Agenda" required/>
                                    <input type="hidden" class="form-control" name="id_pegawai" value="{{ Auth::guard('pgw')->user()->id_pegawai }}" >
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Isi Acara</b></label></br></br>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="isi_acara" placeholder="Masukan Isi Acara" required/></textarea>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Peserta</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="peserta" placeholder="Masukan Peserta" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tempat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tempat" placeholder="Masukan Tempat" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Waktu</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="time" name="waktu" placeholder="Masukan Waktu" required/>
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
<script>

var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});

var input = document.getElementById('time');

timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script>