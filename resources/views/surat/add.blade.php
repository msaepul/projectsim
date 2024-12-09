@extends('layouts.main')
@section('content')
    <!-- Main content -->
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah data
            </div>
            <div class="card-body">
                <form action="{{ route('form.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Surat:</label>
                        <input type="text" class="form-control @error('nama_surat') is-invalid @enderror" id="nama_surat"
                            name="nama_surat" value="{{ old('nama_surat') }}">
                        @error('nama_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Surat:</label>
                        <input type="text" class="form-control @error('jenis_surat') is-invalid @enderror"
                            id="jenis_surat" name="jenis_surat" value="{{ old('jenis_surat') }}">
                        @error('jenis_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Nomor Surat:</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                            name="kode" value="{{ old('kode') }}">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Tanggal Surat</label>
                        <input type="date" class="form-control @error('berlaku') is-invalid @enderror" id="berlaku"
                            name="berlaku" value="{{ old('berlaku') }}">
                        @error('berlaku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cabang_id">cabang:</label>
                        <input type="text" class="form-control" id="cabang_id"
                            name="cabang_id">{{ old('cabang_id') }}</input>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
