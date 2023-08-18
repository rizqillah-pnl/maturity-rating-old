@extends('dashboard.layouts.main')

@section('container')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Surat Masuk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Formulir Tambah Surat Masuk</h2>
                            </div>
                            <div id="button-datatable"></div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <a href="{{ url('surat_masuk') }}" class="btn btn-primary"><i
                                            class="bi bi-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="form-tambah">
                                    <form action="{{ url('surat_masuk') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-12 col-md-4 form-label" for="file_surat">
                                                File Surat
                                            </label>
                                            <div class="col-12 col-md-8">
                                                <input type="file"
                                                    class="form-control @error('file_surat')is-invalid @enderror"
                                                    id="file_surat" name="file_surat" accept="application/pdf">
                                                @error('file_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-12 col-md-4 form-label" for="no_surat">
                                                No Surat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-12 col-md-8">
                                                <input type="text"
                                                    class="form-control @error('no_surat')is-invalid @enderror"
                                                    id="no_surat" name="no_surat" placeholder="Masukkan Nomor Surat"
                                                    required autofocus>
                                                @error('no_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-12 col-md-4 form-label" for="perihal">
                                                Perihal <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-12 col-md-8">
                                                <input type="text"
                                                    class="form-control @error('perihal')is-invalid @enderror"
                                                    id="perihal" name="perihal" placeholder="Masukkan Perihal" required>
                                                @error('perihal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-12 col-md-4 form-label" for="instansi">
                                                Instansi/Lembaga <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-12 col-md-8">
                                                <input type="text"
                                                    class="form-control @error('instansi')is-invalid @enderror"
                                                    id="instansi" name="instansi"
                                                    placeholder="Masukkan Instansi/Lembaga Pengirim" required>
                                                @error('instansi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-12 col-md-4 form-label" for="pengirim">
                                                Pengirim <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-12 col-md-8">
                                                <input type="text"
                                                    class="form-control @error('pengirim')is-invalid @enderror"
                                                    id="pengirim" name="pengirim"
                                                    placeholder="Masukkan Nama Pengirim Surat" required>
                                                @error('pengirim')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-12 col-md-4 form-label" for="tanggal_surat">
                                                Tanggal Surat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-12 col-md-8">
                                                <input type="date"
                                                    class="form-control @error('tanggal_surat')is-invalid @enderror"
                                                    id="tanggal_surat" name="tanggal_surat" required>
                                                @error('tanggal_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-text text-muted"><span class="text-danger">*</span> Wajib Diisikan!
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
