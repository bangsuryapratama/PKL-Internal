@extends('layouts.backend')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Data Produk
                        <a href="{{route ('backend.product.create')}}" class="btn btn-info btn-sm" style="color: white;float: right;">
                            Tambah
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table" id="dataProduct">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $data)
                                        
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->category->name}}</td>
                                        <td>Rp. {{ number_format($data->price)}}</td>
                                        <td>{{$data->stock}}</td>
                                        <td scope="row">
                                            @if($data->image)
                                                <img src="{{Storage::url($data->image)}}" alt="Gambar Produk" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                            @else
                                                <div>Tidak ada gambar</div>
                                            @endif
                                        </td>
                                        <td>{{$data->description}}</td>
                                        <td width="300px">
                                        <a href="{{ route('backend.product.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                        <a href="{{ route('backend.product.show', $data->id) }}" class="btn btn-sm btn-secondary">Show</a> |
                                        <form action="{{ route('backend.product.destroy', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#dataProduct');
</script>
@endpush