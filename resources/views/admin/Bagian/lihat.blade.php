@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Bagian</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bagian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bagians as $index => $bagian)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{$bagian->nama_bagian}}</td>
                                    <td>
                                        <form action="{{ route('bagians.destroy',$bagian->id_bagian) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('bagians.edit',$bagian->id_bagian) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                 </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        {!! $bagians->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection