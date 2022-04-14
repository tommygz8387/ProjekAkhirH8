@extends('partials.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('title')
    Tambah Produk
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"> Tambah Produk</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Produk</h4>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="namaproduk">Nama Produk</label>
                                <input type="text" class="form-control" id="namaproduk" placeholder="Nama Produk">
                            </div>
                            <div class="form-group">
                                <label for="summernote">Deskripsi</label>
                                <textarea id="summernote" name="deskripsi"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Baru</h4>
                        <form class="forms-sample">

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control form-control-lg" id="status" placeholder="Status">
                                    <option value="">awe</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control form-control-lg" id="kategori" placeholder="Kategori">
                                    <option value="">awe</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="harga" class="mb-2">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control" id="harga" placeholder="Harga"
                                        aria-label="Harga">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="berat">Berat</label>
                                <input type="number" class="form-control" id="berat" placeholder="Berat">
                            </div>

                            <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary text-light" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2 text-light">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Deskripsi Produk',
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                ]
            });
        });
    </script>
    <script src="{{ asset('/') }}js/file-upload.js"></script>
@endsection
