@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (session()->get('sukses'))
                    <div class="alert alert-success">
                        {{ session()->get('sukses') }}
                    </div>
                @endif

                <h4 class="m-0 font-weight-bold text-primary">Data Barang</h4>

                <div class="col-md-12 text-right">
                        <a href="{{ route('gudang.create') }}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-600">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah</span>
                        </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBarang as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>
                                    <img src="{{asset('fotobarang/'.$row->gambar)}}" width="50px" height="50px" alt="gambar">
                                </td>
                                <td>{{$row->nama_barang}}</td>
                                <td>17</td>
                                <td>
                                    <div class="dropdown no-arrow mb-4">
                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" >
                                            Action
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('gudang.edit',$row->id)}}">Edit</a>
                                            <a class="dropdown-item" href="{{route('stock.index',$row->id)}}">Lihat Stok</a>
                                            <form action="{{route('gudang.destroy',$row->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <span class="text">Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection