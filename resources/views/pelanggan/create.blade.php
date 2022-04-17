@extends('pelanggan.index')

@section('form')
    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Pelanggan</h4>
                <form method="POST" action="{{ route('pelanggan.store') }}" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Pelanggan" name="name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="4" placeholder="Masukkan Alamat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-light">Submit</button>
                    <button type="reset" class="btn btn-danger text-light">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
