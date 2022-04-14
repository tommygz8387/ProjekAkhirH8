@extends('partials.master')

@section('title')
    Produk
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Produk</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Produk</h4>
                        <a href="{{ route('produk.create') }}" class="btn btn-primary btn-icon-text text-light">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah
                        </a>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataProduk as $produk)
                                    
                                    <tr>
                                        <td>{{ $produk->foto_produk }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->deskripsi }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td>{{ $produk->berat }}</td>
                                        <td>{{ $produk->created_at->toDateString() }}</td>
                                        <td>{{ $produk->status }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning text-light ms-0"><i class="ti-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-danger text-light me-0"><i class="ti-trash"></i></a>
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
@endsection
