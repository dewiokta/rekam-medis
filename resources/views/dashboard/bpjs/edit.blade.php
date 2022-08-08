@extends('dashboard.layouts.main')

@section('container')
<a  href="/dashboard/bpjs">Kembali</a>
<form action="{{ route('bpjs.update',$data->id)  }}" method="post">
{{ csrf_field() }}
      {{ method_field('PUT') }}
  <div class="form-group">
    <label>Tanggal</label>
    <input type="text" name="tanggal" value="{{$data['tanggal']}}" class ="form-control" placeholder="Tanggal Berobat" required>
  </div>
  <div class="form-group">
    <label>Nama Pasien</label>
    <input type="text" name="nama_peserta" value="{{$data['nama_peserta']}}" class ="form-control" placeholder="Nama Lengkap" required>
  </div>
  <div class="form-group">
    <label>Kepala Keluarga</label>
    <input type="text" name="kepala_keluarga" value="{{$data['kepala_keluarga']}}" class ="form-control" placeholder="Nama Ayah / Suami" required>
  </div>
  <div class="form-group">
    <label>Nomer Peserta</label>
    <input type="number" name="nomer_peserta" value="{{$data['nomer_peserta']}}" class ="form-control" placeholder="Nomer Identitas" required>
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
    <input type="number" name="nomer_telepon" value="{{$data['nomer_telepon']}}" class ="form-control" placeholder="Nomer Yang Dapat Dihubungi" required>
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