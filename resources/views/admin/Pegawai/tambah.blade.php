@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">TAMBAH DATA PEGAWAI</h4></br>
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
                <form action="{{ route('pegawais.store') }}" method="post">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Nama Pegawai</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_pegawai" placeholder="Masukan Nama Pegawai" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>NIP</b></label></br></br>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="nip" placeholder="Masukan NIP" required/>
                                    <input type="text" class="form-control" name="level" value="Pengelola Surat" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Username</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Masukan Username" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Password</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="password" placeholder="Masukan Password" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Konfirmasi Password</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="konfirm_password" placeholder="Masukan Konfirmasi Password" required/>
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