@extends('partials.master')

@section('title')
    Produk
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        .rounded {
            width: 4rem !important;
            height: 4rem !important;
        }

    </style>
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
                                        <th>Harga</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataProduk as $produk)
                                        <tr>
                                            <td><img src="{{ asset('/foto_produk') }}/{{ $produk->foto_produk }}"
                                                    alt="foto produk" class="rounded"></td>
                                            <td><strong>
                                                    {{ $produk->nama_produk }}<br><br>
                                                    Kategori : <span
                                                        class="badge rounded-pill bg-info">{{ $produk->kategori->nama_kategori }}</span><br><br>
                                                    Berat : <span
                                                        class="badge rounded-pill bg-info">{{ $produk->berat }}gr</span><br><br>
                                                </strong></td>
                                            <td>Rp. {{ number_format($produk->harga) }}</td>
                                            <td>{{ $produk->created_at->toDateString() }}</td>
                                            <td>
                                                @if ($produk->status == 'Draft')
                                                    <span class="badge rounded-pill bg-warning">{{ $produk->status }}</span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill bg-success">{{ $produk->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('produk.edit', ['id' => $produk->id]) }}"
                                                    class="btn btn-warning text-light ms-0"><i
                                                        class="ti-pencil-alt"></i></a>
                                                <a href="{{ route('produk.delete', ['id' => $produk->id]) }}"
                                                    class="btn btn-danger text-light me-0"><i
                                                        class="ti-trash"></i></a>
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
