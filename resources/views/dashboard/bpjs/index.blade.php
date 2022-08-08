@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pendaftaran Pasien BPJS</h1>
</div>
<!-- <button type="button" class="btn btn-primary">Tambah Data</button> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data Pasien Baru
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
  Tambah Data Pasien Lama
</button>

<!-- Tambah Data Baru -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('bpjs.store') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Berobat" required>
          </div>
          <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="nama_peserta" class="form-control" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
            <label>Kepala Keluarga</label>
            <input type="text" name="kepala_keluarga" class="form-control" placeholder="Nama Ayah / Suami" required>
          </div>
          <div class="form-group">
            <label>Nomer Peserta Bpjs</label>
            <input type="text" pattern="[0-9]{11,15}" title="Masukan Angka Dan Sesuai Format" name="nomer_peserta" class="form-control" placeholder="Nomer Identitas" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required>
          </div>
          <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" placeholder="Agama" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label>Nomer Telepon</label>
            <input type="text" pattern="[0-9]{12,13}" title="Masukan 12 - 13 Angka Dan Sesuai Format" name="nomer_telepon" class="form-control" placeholder="Nomer Yang Dapat Dihubungi" required>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <input type="text" name="keluhan" class="form-control" placeholder="Keluhan Sakit" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Data</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Tambah Data Lama-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien Lama</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('bpjs.store') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Berobat" required>
          </div>
          <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="nama_peserta" class="form-control" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
            <label>Kepala Keluarga</label>
            <input type="text" name="kepala_keluarga" class="form-control" placeholder="Nama Ayah / Suami" required>
          </div>
          <div class="form-group">
            <label>Nomer Peserta Bpjs</label>
            <input type="text" pattern="[0-9]{11,15}" title="Masukan Angka Dan Sesuai Format" name="nomer_peserta" class="form-control" placeholder="Nomer Identitas" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required>
          </div>
          <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" placeholder="Agama" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label>Nomer Telepon</label>
            <input type="text" pattern="[0-9]{12,13}" title="Masukan 12 - 13 Angka Dan Sesuai Format" name="nomer_telepon" class="form-control" placeholder="Nomer Yang Dapat Dihubungi" required>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <input type="text" name="keluhan" class="form-control" placeholder="Keluhan Sakit" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Data</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>

<a href="/export-csv-bpjs" target="_blank" class="btn btn-primary me-1">Download Excel</a>
<a href="/export-pdf-pendaftaranBpjs" target="_blank" class="btn btn-primary me-1">Download Pdf</a>

<div class="row justify-content-end">
  <div class="col-md-6">
    <form action="/dashboard/bpjs">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search">
        <button class="btn btn-primary me-1" type="submit" id="button-addon2">Search</button>
      </div>
    </form>
  </div>
</div>

<div class="table-responsive">
  <!-- <table class="table table-striped table-sm"> -->
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Kepala Keluarga</th>
        <th scope="col">Nomer Identitas</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Agama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nomer Telepon</th>
        <th scope="col">Keluhan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @if (count($bpjs) > 0)
    @foreach($bpjs as $key=>$item)
    <tbody>
      <tr>
        <td>{{ $loop -> iteration}}</td>
        <td>{{ $item -> tanggal }}</td>
        <td>{{ $item -> nama_peserta }}</td>
        <td>{{ $item -> kepala_keluarga }}</td>
        <td>{{ $item -> nomer_peserta }}</td>
        <td>{{ $item -> tanggal_lahir }}</td>
        <td>{{ $item -> agama }}</td>
        <td>{{ $item -> alamat }}</td>
        <td>{{ $item -> nomer_telepon }}</td>
        <td>{{ $item -> keluhan }}</td>
        <td>
          <form action="{{ route('bpjs.destroy',$item->id)  }}" method="post" onsubmit="return confirm('Yakin Hapus Data?')">
            <a class="btn btn-primary" href="{{ route('bpjs.edit',$item->id)  }}">Edit</a>
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach
    @endif
  </table>
  {{$bpjs->links()}}
</div>
@endsection