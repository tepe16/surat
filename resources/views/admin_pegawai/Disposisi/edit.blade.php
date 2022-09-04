@extends('admin_pegawai.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">EDIT DATA DISPOSISI</h4></br>
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
                <form action="{{ route('disposisi.update',$disposisi->id_disposisi) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>NO Surat</b></label></br></br>
                                <div class="form-group">
                                    <select type="text" class="form-control" name="no_surat" required/>
                                    <option value="{{$disposisi->no_surat}}">{{$disposisi->no_surat}}</option>
                                    <option value="" disable="">--PILIH NO SURAT--</option>
                                    @foreach($surat_masuk as $sm)
                                    <option value="{{$sm->no_surat_masuk}}">{{$sm->no_surat_masuk}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Jenis Surat</b></label></br></br>
                                <div class="form-group">
                                    <select type="text" class="form-control" name="id_jenis_surat" required/>
                                    
                                    <option value="{{$disposisi->id_jenis_surat}}">{{$disposisi->nama_jenis}}</option>
                                    <option value="" disable="">--PILIH JENIS SURAT JIKA INGIN DIUBAH--</option>
                                    @foreach($jenis as $a)
                                    <option value="{{$a->id_jenis_surat}}">{{$a->nama_jenis}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Instansi</b></label></br></br>
                                <div class="form-group">
                                    <select type="text" class="form-control" name="id_instansi" required/>
                                    <option value="{{$disposisi->id_instansi}}">{{$disposisi->nama_instansi}}</option>
                                    <option value=""  disable="">--PILIH INSTANSI JIKA INGIN DIUBAH--</option>
                                    @foreach($instansi as $b)
                                    <option value="{{$b->id_instansi}}">{{$b->nama_instansi}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Bagian</b></label></br></br>
                                <div class="form-group">
                                    <select type="text" class="form-control" name="id_bagian" required/>
                                    <option value="{{$disposisi->id_bagian}}">{{$disposisi->nama_bagian}}</option>
                                    <option value="" disable="">--PILIH BAGIAN--</option>
                                    @foreach($bagian as $c)
                                    <option value="{{$c->id_bagian}}">{{$c->nama_bagian}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Perihal</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="perihal" value="{{$disposisi->perihal}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Sifat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="sifat" value="{{$disposisi->sifat}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tujuan</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tujuan" value="{{$disposisi->tujuan}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Rahasia</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="rahasia" value="{{$disposisi->rahasia}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tanggal Surat</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_surat" value="{{$disposisi->tgl_surat}}" required/>
                                    <option></option>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Tanggal Terima</b></label></br></br>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_terima" value="{{$disposisi->tgl_terima}}" max="{{ date('Y-m-d')}}" required/>
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