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
                  <table class="table table-bordered table-hover">
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
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td>Approved</td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      </tr>
                      <tr class="expandable-body">
                        <td colspan="5">
                            <div class="card-header">
                                {{-- <i class=""></i> --}}
                                <a href="#" class="btn btn-sm btn-primary">show</a>
                                <a href="#" class="btn btn-sm btn-primary">edit</a>
                                <a href="#" class="btn btn-sm btn-primary">hapus</a>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
@endsection
