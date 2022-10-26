@extends('pengelola_camat.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">TAMBAH DATA DISPOSISI</h4></br>
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
                <form action="{{ route('disposisi.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>No Surat Masuk</b></label></br></br>
                                <div class="form-group">
                                    <select class="form-control" name="id_surat_masuk">
                                    <option value="" selected="" disable="">--PILIH NO SURAT MASUK--</option>
                                    @foreach($suratmasuk as $a)
                                    <option value="{{$a->id_surat_masuk}}">{{$a->id_kode_surat}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tanggal Penyelesaian</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_penyelesaian" placeholder="Masukan Tanggal Penyelesaian" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tanggal Kembali</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_kembali" placeholder="Masukan Tanggal Kembali" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Kembali Kepada</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="kembali_kepada" placeholder="Masukan Kembali Kepada" required/>
                                    <input type="hidden" class="form-control" name="id_pegawai_camat" value="{{ Auth::guard('camat')->user()->id_pegawai_camat }}" >
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Intruksi</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="intruksi" placeholder="Masukan Intruksi" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Sifat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sifat" placeholder="Masukan Sifat" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tujuan</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tujuan" placeholder="Masukan Tujuan" required/>
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