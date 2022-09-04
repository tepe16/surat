@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Jenis Surat</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jenis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenis as $index => $jns)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$jns->nama_jenis}}</td>
                                    <td>
                                        <form action="{{ route('jenis.destroy',$jns->id_jenis_surat) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('jenis.edit',$jns->id_jenis_surat) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $jenis->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection