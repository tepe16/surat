@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">EDIT DATA ADMIN</h4></br>
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
                <form action="{{ route('users.update' , $user->user_id) }}" method="post">
                @method('PUT')
                @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <labbel><b>Nama</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Masukan Nama" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Username</b></label></br></br>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" value="{{$user->username}}" placeholder="Masukan Username" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>New Password</b></label></br></br>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"  placeholder="Masukan Password Baru" required/>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <labbel><b>Konfirmasi Password</b></label></br></br>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="konfirm_password"  placeholder="Masukan Konfirmasi Password" required/>
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