@extends('admin_pegawai.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">TAMBAH DATA KODE SURAT</h4></br>
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
                <form action="{{ route('kode.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Kode Surat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id_kode_surat" placeholder="Masukan Kode Surat" required/>
                                    <input type="hidden" class="form-control" name="id_pegawai" value="{{ Auth::guard('pgw')->user()->id_pegawai }}" >
                                </div>
                            </div>
                            <div class="col-md-9">
                                <labbel><b>Nama Surat</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_kode_surat" placeholder="Masukan Nama Surat" required/>
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