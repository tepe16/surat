@extends('pengelola_camat.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">EDIT DATA PEGAWAI CAMAT</h4></br>
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
                <form action="{{ route('settingcamat.update' , $camat->id_pegawai_camat) }}" method="post">
                @method('PUT')
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Nama Pegawai</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_pegawai_camat" value="{{$camat->nama_pegawai_camat}}"  placeholder="Masukan Nama Pegawai">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>NIP</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nip" value="{{$camat->nip}}" placeholder="Masukan NIP">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Level</b></label></br></br>
                                <div class="form-group">
                                    <select type="number" class="form-control" name="level" required/>
                                       <option value="{{$camat->level}}">--PILIH LEVEL JIKA INGIN DI UBAH--</option>
                                       <option value="Camat">Camat</option>
                                       <option value="Sekretaris Camat">Sekretaris Camat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Username</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" value="{{$camat->username}}" placeholder="Masukan Username">
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>New Password</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="password" placeholder="Masukan Password">
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Konfirmasi Password</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="konfirm_password" placeholder="Masukan Konfirmasi Password">
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