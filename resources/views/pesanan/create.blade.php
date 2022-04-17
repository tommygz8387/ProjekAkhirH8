@extends('partials.master')

@section('title')
    Tambah Pesanan
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"> Tambah Pesanan</h4>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('pesanan.store') }}" enctype="multipart/form-data" class="forms-sample">
            @csrf
            <div class="row">
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Pesanan</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="produk">Produk</label>
                                    <select class="form-control form-control-lg" id="produk" placeholder="Produk"
                                        name="produk_id" required>
                                        <option selected disabled value="">Pilih Produk</option>
                                        @foreach ($dataProduk as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Quantity">Quantity</label>
                                    <input type="number" class="form-control" id="Quantity" placeholder="Quantity"
                                        name="qty" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Pesanan</h4>

                            <div class="form-group">
                                <label for="Pelanggan">Pelanggan</label>
                                <select class="form-control form-control-lg" id="Pelanggan" placeholder="Pelanggan"
                                    name="pelanggan_id" required>
                                    <option selected disabled value="">Pilih Pelanggan</option>
                                    @foreach ($dataPelanggan as $pe)
                                        <option value="{{ $pe->id }}">{{ $pe->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control form-control-lg" id="status" placeholder="Status" name="status"
                                    required>
                                    <option selected disabled value="">Pilih Status</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Batal">Batal</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Date">Date</label>
                                <input type="date" class="form-control" id="Date" placeholder="Date" name="date" required>
                            </div>

                            <button type="submit" class="btn btn-primary me-2 text-light">Save</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
