@extends('dashboard.layouts.main')

@section('container')
<a  href="/dashboard/pendaftaran">Kembali</a>
<form action="{{ route('pendaftaran.update',$data->id)  }}" method="post">
{{ csrf_field() }}
      {{ method_field('PUT') }}
  <div class="form-group">
    <label>Tanggal</label>
    <input type="text" name="tanggal" value="{{$data['tanggal']}}" class ="form-control" placeholder="Tanggal Berobat" required>
  </div>
  <div class="form-group">
    <label>Nama Pasien</label>
    <input type="text" name="nama_pasien" value="{{$data['nama_pasien']}}" class ="form-control" placeholder="Nama Lengkap" required>
  </div>
  <div class="form-group">
    <label>Kepala Keluarga</label>
    <input type="text" name="kepala_keluarga" value="{{$data['kepala_keluarga']}}" class ="form-control" placeholder="Nama Ayah / Suami" required>
  </div>
  <div class="form-group">
    <label>Nik</label>
    <input type="text" pattern="[0-9]{16}" title="Masukan 16 Angka Dan Sesuai Format" name="nik" value="{{$data['nik']}}" class ="form-control" placeholder="Nomer Identitas" required>
  </div>
  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="text" name="tanggal_lahir" value="{{$data['tanggal_lahir']}}" class ="form-control" placeholder="Tanggal Lahir" required>
  </div>
  <div class="form-group">
    <label>Agama</label>
    <input type="text" name="agama" value="{{$data['agama']}}" class ="form-control" placeholder="Agama" required>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" value="{{$data['alamat']}}" class ="form-control" placeholder="Alamat" required>
  </div>
  <div class="form-group">
    <label>Nomer Telepon</label>
    <input type="number" pattern="[0-9]{12,13}" title="Masukan 12 - 13 Angka Dan Sesuai Format" name="nomer_telepon" value="{{$data['nomer_telepon']}}" class ="form-control" placeholder="Nomer Yang Dapat Dihubungi" required>
  </div>
  <div class="form-group">
    <label>Keluhan</label>
    <input type="text" name="keluhan" value="{{$data['keluhan']}}" class ="form-control" placeholder="Keluhan Sakit" required>
  </div>
  <!-- <div class="modal-footer"> -->
    <div class="modal-footer">
        <!-- <button type="button" href="/dashboard/pendaftaran" class="btn btn-secondary">Close</button> -->
        <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
</form>      
@endsection