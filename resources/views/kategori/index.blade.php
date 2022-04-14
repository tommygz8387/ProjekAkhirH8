@extends('partials.master')

@section('title')
    Kategori
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Kategori</h4>
                    </div>
                </div>
            </div>
        </div>

        @include('sweetalert::alert')

        <div class="row">
            @yield('form')

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Kategori</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Parent</th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($dataKategori as $kategori)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $kategori->jenis_kategori }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>{{ $kategori->created_at->toDateString() }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit', ['id' => $kategori->id]) }}"
                                                    class="btn btn-warning text-light ms-0"><i class="ti-pencil-alt"></i></a>
                                                <a href="{{ route('kategori.delete', ['id' => $kategori->id]) }}"
                                                    class="btn btn-danger text-light me-0"><i class="ti-trash"></i></a>
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
