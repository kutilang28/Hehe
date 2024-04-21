@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                    <div class="card-tools">
                        <a href="{{route('buku.create')}}" class="btn btn-success">Tambah Buku <i class="fas fa-plus-square"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">id buku</th>
                                <th>Judul Buku</th>
                                <th>Foto Buku</th>
                                <th>Penulis</th>
                                <th>Judul</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item -> id}}</td>
                                    <td>{{$item -> judul}}</td>
                                    <td>
                                        <img src="{{asset('img/'.$item->foto)}}" width="100px">
                                    </td>
                                    <td>{{$item -> penulis}}</td>
                                    <td>{{$item -> judul}}</td>
                                    <td>{{$item -> penerbit}}</td>
                                    <td>{{$item -> tahun_terbit}}</td>
                                    <td>{{$item -> kategori}}</td>
                                    <td>
                                        <form action="{{ route('buku.destroy', $item->id)  }}" method="POST">
                                            <a class="btn btn-warning" href="{{route('buku.edit', $item->id)}}">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>

@include('layouts.footer')
