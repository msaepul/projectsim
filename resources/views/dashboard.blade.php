@extends('layouts.main')
@section('content')
    <h1>Selamat Datang, {{ $name }}</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header bg-blue">
                        <h3 class="card-title">Surat Masuk</h3>
                        <div class="card-tools">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">100 Surat Masuk</h5>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Surat Keluar</h3>
                        <div class="card-tools">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">50 Surat Keluar</h5>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header bg-red">
                        <h3 class="card-title">Surat Pending</h3>
                        <div class="card-tools">
                            <i class="fas fa-clipboard"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">20 surat</h5>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header bg-green">
                        <h3 class="card-title">Arsip</h3>
                        <div class="card-tools">
                            <i class="fas fa-archive"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">1000 Arsip</h5>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
