@extends('layouts.main')

@section('content_header')
    <h1 class="card-title">Data Jenis Surat</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Jenis Surat</h3>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSuratModal">
                    <i class="fas fa-plus"></i> Buat Surat Baru
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
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
                                <!-- Edit Button -->
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSuratModal"
                                    data-id="{{ $surat->id }}" data-nama_surat="{{ $surat->nama_surat }}"
                                    data-jenis_surat="{{ $surat->jenis_surat }}" data-kode_surat="{{ $surat->kode_surat }}"
                                    data-keterangan="{{ $surat->keterangan }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <!-- Modal Edit Surat -->
                                <div class="modal fade" id="editSuratModal" tabindex="-1" role="dialog"
                                    aria-labelledby="editSuratModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editSuratModalLabel">Edit Surat</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="" id="editSuratForm">
                                                    @csrf
                                                    {{-- @method('PUT') --}}
                                                    <div class="form-group">
                                                        <label for="edit_nama_surat">Nama Surat</label>
                                                        <input type="text" class="form-control" id="edit_nama_surat"
                                                            name="nama_surat" value="{{ $surat->nama_surat }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_jenis_surat">Jenis Surat</label>
                                                        <select class="form-control" name="jenis_surat"
                                                            id="edit_jenis_surat">
                                                            <option value="pelatihan">Surat Pelatihan</option>
                                                            <option value="tugas">Surat Tugas</option>
                                                            <option value="keputusan">Surat Keputusan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_kode_surat">Kode Surat</label>
                                                        <input type="text" class="form-control" id="edit_kode_surat"
                                                            name="kode_surat" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_keterangan">Keterangan</label>
                                                        <input type="text" class="form-control" id="edit_keterangan"
                                                            name="keterangan" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-save"></i> Simpan Perubahan
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Button -->
                                <form action="{{ route('master.jenissurat.destroy', $surat->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE') <!-- Menambahkan metode DELETE -->
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
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
@endsection

@section('scripts')
    <script>
        $('#editSuratModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var nama_surat = button.data('nama_surat')
            var jenis_surat = button.data('jenis_surat')
            var kode_surat = button.data('kode_surat')
            var keterangan = button.data('keterangan')

            var modal = $(this)
            modal.find('#edit_nama_surat').val(nama_surat)
            modal.find('#edit_jenis_surat').val(jenis_surat)
            modal.find('#edit_kode_surat').val(kode_surat)
            modal.find('#edit_keterangan').val(keterangan)

            var action = '/master/jenissurat/' + id
            modal.find('#editSuratForm').attr('action', action)
        })
    </script>
@endsection
