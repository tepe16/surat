@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pegawai</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Level</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pegawais as $index => $pegawai)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$pegawai->nama_pegawai}}</td>
                                    <td>{{$pegawai->nip}}</td>
                                    <td>{{$pegawai->level}}</td>
                                    <td>{{$pegawai->username}}</td>
                                    <td>
                                        <form action="{{ route('pegawais.destroy',$pegawai->id_pegawai) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('pegawais.edit',$pegawai->id_pegawai) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $pegawais->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection