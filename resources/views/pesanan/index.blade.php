@extends('partials.master')

@section('title')
    Pesanan
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                        <h4 class="font-weight-bold mb-0">Pesanan</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Pesanan</h4>
                        <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-icon-text text-light">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah
                        </a>
                        <button class="btn btn-secondary btn-icon-text text-light" type="button" data-bs-toggle="modal"
                            data-bs-target="#importExcel">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Mass Upload
                        </button>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Pelanggan</th>
                                        <th>InvoiceID</th>
                                        <th>Unit</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPesanan as $pesanan)
                                        <tr>
                                            <td>{{ $pesanan->produk->nama_produk }}</td>
                                            <td>{{ $pesanan->pelanggan->name }}</td>
                                            <td>{{ $pesanan->invoice_id }}</td>
                                            <td>{{ $pesanan->qty }}</td>
                                            <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
                                            <td>{{ $pesanan->date }}</td>
                                            <td>
                                                @if ($pesanan->status == 'Selesai')
                                                    <span
                                                        class="badge rounded-pill bg-success">{{ $pesanan->status }}</span>
                                                @elseif ($pesanan->status == 'Proses')
                                                    <span
                                                        class="badge rounded-pill bg-warning">{{ $pesanan->status }}</span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill bg-danger">{{ $pesanan->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('pesanan.edit', ['id' => $pesanan->id]) }}"
                                                    class="btn btn-warning text-light ms-0"><i
                                                        class="ti-pencil-alt"></i></a>
                                                <a href="{{ route('pesanan.delete', ['id' => $pesanan->id]) }}"
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

        {{-- Modal Import --}}
        <!-- Modal -->
        <div class="modal fade" id="importExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('pesanan.import') }}" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Pilih File Excel</label>
                                <input class="form-control pb-3" type="file" id="formFile" name="file" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-light">Import</button>
                        </div>
                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
