@extends('layouts.main')
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('form.add') }}" class="btn btn-sm btn-primary">Tambah data</a>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asal Surat</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $data)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>183</td>
                                    <td>{{ $data->nama_surat }}</td>
                                    <td>{{ $data->jenis_surat }}</td>
                                    <td>{{ $data->kode }}</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="5">
                                        <div class="card-header">
                                            {{-- <i class=""></i> --}}
                                            {{-- <a href="{{ route('', $post->id) }}" class="btn btn-sm btn-primary">show</a> --}}
                                            <a href="{{ route('form.edit', $data->id) }}"
                                                class="btn btn-sm btn-primary">edit</a>
                                            <form action="{{ route('form.destroy', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE') <!-- Menambahkan metode DELETE -->
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
