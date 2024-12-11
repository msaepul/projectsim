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
                                <div class="d-flex gap-2">
                                    <!-- Button untuk Edit Modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#editModal-{{ $surat->id }}">
                                        Edit
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
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
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
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>


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

{{-- @section('scripts')
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
    </script> --}}
{{-- @endsection --}}
