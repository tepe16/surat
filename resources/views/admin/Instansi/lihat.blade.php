@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Instansi</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($instansi as $index => $ins)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$ins->nama_instansi}}</td>
                                    <td>
                                        <form action="{{ route('instansi.destroy',$ins->id_instansi) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('instansi.edit',$ins->id_instansi) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $instansi->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection