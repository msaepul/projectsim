@extends('layouts.main')

@section('content_header')
    <h1 class="card-title">Data Jenis Surat</h1>
@endsection

@section('content')
    <div class="alert alert-info" role="alert">
        <strong>Info:</strong> Pastikan semua data surat terisi dengan lengkap dan benar.
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Jenis Surat</h3>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambahSuratModal">
                    <i class="fas fa-plus"></i> Buat Surat Baru
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" style="background-color: #f0f8ff; color: #000;">
                <thead style="background-color: #d6eaff;">
                    <tr>
                        <th>Nama Surat</th>
                        <th>Jenis Surat</th>
                        <th>Kode Surat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($JenisSurat as $surat)
                        <tr id="surat-{{ $surat->id }}">
                            <td>{{ $surat->nama_surat }}</td>
                            <td>{{ $surat->jenis_surat }}</td>
                            <td>{{ $surat->kode_surat }}</td>
                            <td>{{ $surat->keterangan }}</td>
                            <td>
                                <div class="d-flex" style="gap: 8px;">
                                    <!-- Button untuk Edit Modal -->
                                    <button type="button" class="btn btn-sm btn-primary me-3" data-toggle="modal"
                                        data-target="#editModal-{{ $surat->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal-{{ $surat->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel-{{ $surat->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('master.jenissurat.update', $surat->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel-{{ $surat->id }}">Edit
                                                            Surat</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama_surat">Nama Surat:</label>
                                                            <input type="text" class="form-control" id="nama_surat"
                                                                name="nama_surat" value="{{ $surat->nama_surat }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_surat">Jenis Surat:</label>
                                                            <select class="form-control" id="jenis_surat" name="jenis_surat"
                                                                required>
                                                                <option value="pelatihan"
                                                                    {{ $surat->jenis_surat == 'pelatihan' ? 'selected' : '' }}>
                                                                    Surat Pelatihan</option>
                                                                <option value="tugas"
                                                                    {{ $surat->jenis_surat == 'tugas' ? 'selected' : '' }}>
                                                                    Surat Tugas</option>
                                                                <option value="keputusan"
                                                                    {{ $surat->jenis_surat == 'keputusan' ? 'selected' : '' }}>
                                                                    Surat Keputusan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kode_surat">Kode Surat:</label>
                                                            <input type="text" class="form-control" id="kode_surat"
                                                                name="kode_surat" value="{{ $surat->kode_surat }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="keterangan">Keterangan:</label>
                                                            <input type="text" class="form-control" id="keterangan"
                                                                name="keterangan" value="{{ $surat->keterangan }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-save"></i> Simpan Perubahan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('master.jenissurat.destroy', $surat->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada data jenis surat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Surat -->
    <div class="modal fade" id="tambahSuratModal" tabindex="-1" role="dialog" aria-labelledby="tambahSuratModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSuratModalLabel">Tambah Surat Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('master.jenissurat.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama_surat">Nama Surat</label>
                            <input type="text" class="form-control" id="nama_surat" name="nama_surat" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_surat">Jenis Surat</label>
                            <select class="form-control" name="jenis_surat">
                                <option value="">Pilih Jenis Surat</option>
                                <option value="pelatihan">Surat Pelatihan</option>
                                <option value="tugas">Surat Tugas</option>
                                <option value="keputusan">Surat Keputusan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kode_surat">Kode Surat</label>
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        table tbody tr:hover {
            background-color: #e3f2fd;
            cursor: pointer;
        }
    </style>
@endsection
