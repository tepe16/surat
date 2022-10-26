@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pegawai Camat</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai Camat</th>
                                    <th>NIP</th>
                                    <th>Level</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($camat as $index => $cmt)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$cmt->nama_pegawai_camat}}</td>
                                    <td>{{$cmt->nip}}</td>
                                    <td>{{$cmt->level}}</td>
                                    <td>{{$cmt->username}}</td>
                                    <td>
                                        <form action="{{ route('camats.destroy',$cmt->id_pegawai_camat) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('camats.edit',$cmt->id_pegawai_camat) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $camat->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection