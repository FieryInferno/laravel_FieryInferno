@extends('master')
@section('content')
  <div class="card">
    <div class="card-header">
      <a type="button" class="btn btn-primary" href="/rumah_sakit/tambah">Tambah</a>
    </div>
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Rumah Sakit</th>
            <th scope="col">Alamat</th>
            <th scope="col">Email</th>
            <th scope="col">Telepon</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="container">
          <?php $no = 1; ?>
          @foreach ($rumahSakit as $rs)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $rs->nama }}</td>
              <td>{{ $rs->alamat }}</td>
              <td>{{ $rs->email }}</td>
              <td>{{ $rs->telepon }}</td>
              <td>
                <a class="btn btn-primary" href="/rumah_sakit/edit/{{ $rs->id }}">Edit</a>
                <button class="btn btn-danger" onclick="deleteData('rumah_sakit', '{{ $rs->id }}')">Hapus</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection