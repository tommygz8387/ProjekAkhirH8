@extends('pelanggan.index')

@section('title')
    Edit Kategori
@endsection

@section('form')
    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Pelanggan</h4>
                <form method="POST" action="{{ route('pelanggan.update',['id' => $edit->id]) }}" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Pelanggan" name="name"
                            required value="{{ $edit->name }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="4" placeholder="Masukkan Alamat" required>{{ $edit->alamat }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-light">Submit</button>
                    <button type="reset" class="btn btn-danger text-light">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
