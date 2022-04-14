@extends('kategori.index')

@section('title')
    Edit Kategori
@endsection

@section('form')
    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kategori Baru</h4>
                <form method="POST" action="{{ route('kategori.update', ['id' => $edit->id]) }}"
                    enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="namakategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namakategori" placeholder="Nama Kategori"
                            name="nama_kategori" value="{{ $edit->nama_kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control form-control-lg" id="kategori" placeholder="Kategori"
                            name="jenis_kategori" required>
                            <option selected disabled>Pilih Kategori</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Smartphone">Smartphone</option>
                            <option value="Produk Virtual">Produk Virtual</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-light">Submit</button>
                    <button type="reset" class="btn btn-danger text-light">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
