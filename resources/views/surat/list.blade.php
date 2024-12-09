@extends('layouts.main')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{-- <i class=""></i> --}}
            <a href="{{ route('form.add') }}" class="btn btn-sm btn-primary">Tambah data</a>
        </div>
        <!-- Main content -->
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <th>No</th>
                            <th>Nama Surat</th>
                            <th>Jenis Surat</th>
                            <th>Kode Surat</th>
                            <th>Cabang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surats as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->nama_surat }}</td>
                                <td>{{ $data->jenis_surat }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->cabang_id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('form.edit', $data->id) }}"
                                            class="btn btn-sm btn-primary mr-2">Edit</a>
                                        <form action="{{ route('form.destroy', $data->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
