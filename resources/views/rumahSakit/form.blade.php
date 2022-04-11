@extends('master')
@section('content')
  <div class="card">
    <div class="card-header">
      {{ $mode == 'add' ? 'Tambah' : 'Edit' }} Rumah Sakit
    </div>
    <div class="card-body">
      <div class="col-md-6">
        <form action="/rumah_sakit/{{ $mode === 'edit' ? 'edit/' . $id : 'tambah' }}" method="post">
          @csrf
          {{ $mode === 'edit' ? method_field('PUT') : '' }}
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mode === 'edit' ? $nama : '' }}">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mode === 'edit' ? $alamat : '' }}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mode === 'edit' ? $email : '' }}">
          </div>
          <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $mode === 'edit' ? $telepon : '' }}">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection