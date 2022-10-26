@extends('admin_pegawai.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">TAMBAH DATA SURAT MASUK</h4></br>
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
                <form action="{{ route('suratmasuk.update', $suratmasuk->id_surat_masuk) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Jenis Surat</b></label></br></br>
                                <div class="form-group">
                                    <select type="text" class="form-control" name="id_kode_surat" required/>
                                    <option value="" disable="">--PILIH JENIS SURAT JIKA INGIN DIUBAH--</option>
                                    @foreach($kode as $a)
                                    <option value="{{$a->id_kode_surat}}">{{$a->id_kode_surat}}-{{$a->nama_kode_surat}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tanggal Masuk</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_masuk" value="{{$suratmasuk->tgl_masuk}}" max="{{ date('Y-m-d')}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Perihal</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="perihal"  value="{{$suratmasuk->perihal}}" required/>
                                    <input type="hidden" class="form-control" name="id_pegawai" value="{{ Auth::guard('pgw')->user()->id_pegawai }}" >
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Asal Surat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="asal_surat" value="{{$suratmasuk->asal_surat}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Lembar Surat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="lembar_surat" value="{{$suratmasuk->lembar_surat}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Lampiran Surat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="lampiran" value="{{$suratmasuk->lampiran}}" required/>
                                    <option></option>
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