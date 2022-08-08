@extends('dashboard.layouts.main')

@section('container')
<a href="/dashboard/pemeriksaan">Kembali</a>
<form action="{{ route('pemeriksaan.update',$data->id)  }}" method="post">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
  <div class="form-group">
    <label>Pemeriksaan</label>
    <input type="text" name="pemeriksaan" value="{{$data['pemeriksaan']}}" class="form-control" placeholder="Pemeriksaan" required>
  </div>
  <div class="form-group">
    <label>Tekanan Darah</label>
    <input type="text" name="tekanan_darah" value="{{$data['tekanan_darah']}}" class="form-control" placeholder="Tekanan Darah" required>
  </div>
  <div class="form-group">
    <label>Berat Badan</label>
    <input type="text" name="berat_badan" value="{{$data['berat_badan']}}" class="form-control" placeholder="Berat Badan" required>
  </div>
  <div class="form-group">
    <label>Tinggi Badan</label>
    <input type="text" name="tinggi_badan" value="{{$data['tinggi_badan']}}" class="form-control" placeholder="Tinggi Badan" required>
  </div>
  <div class="form-group">
    <label>Denyut Nadi</label>
    <input type="text" name="nadi" value="{{$data['nadi']}}" class="form-control" placeholder="Denyut Nadi" required>
  </div>
  <div class="form-group">
    <label>Suhu Badan</label>
    <input type="text" name="suhu" value="{{$data['suhu']}}" class="form-control" placeholder="Suhu Badan" required>
  </div>
  <div class="form-group">
    <label>RR</label>
    <input type="text" name="RR" value="{{$data['RR']}}" class="form-control" placeholder="RR" required>
  </div>
  <div class="form-group">
    <label>Cek SPO</label>
    <input type="text" name="cek_spo" value="{{$data['cek_spo']}}" class="form-control" placeholder="Cek SPO" required>
  </div>
  <div class="form-group">
    <label>Diagnosa</label>
    <input type="text" name="diagnosa" value="{{$data['diagnosa']}}" class="form-control" placeholder="Diagnosa" required>
  </div>
  <div class="form-group">
    <label>Obat</label>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="paracetamol">
        <label class="form-check-label">Paracetamol</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="sangobion">
        <label class="form-check-label">Sangobion</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="neurobion">
        <label class="form-check-label">Neurobion</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="sanmol">
        <label class="form-check-label">Sanmol</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="triocid">
        <label class="form-check-label">Triocid</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="dextim">
        <label class="form-check-label">Dextim</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="trianta">
        <label class="form-check-label">Trianta</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="ranitidin">
        <label class="form-check-label">Ranitidin</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="cavicur">
        <label class="form-check-label">Cavicur</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check1" name="obat[]" value="imunos">
        <label class="form-check-label">Imunos</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Detail Resep</label>
    <textarea class="form-control" name="detail_resep" id="comments" style="height: 100px;"></textarea>
  </div>
  <div class="form-group">
    <label>Jumlah Kunjungan</label>
    <input type="number" name="jml_kunjungan" value="{{$data['jml_kunjungan']}}" class="form-control" placeholder="Jumlah Kunjungan" required>
  </div>
  <div class="form-group">
    <label>Terapi</label>
    <input type="text" name="terapi" value="{{$data['terapi']}}" class="form-control" placeholder="Terapi" required>
  </div>
  <div class="form-group">
    <label>Biaya dan Keterangan</label>
    <input type="text" name="biaya_keterangan" value="{{$data['biaya_keterangan']}}" class="form-control" placeholder="Biaya dan Keterangan" required>
  </div>
  <!-- <div class="form-group">
    <label>Status</label>
    <input type="text" name="status" value="{{$data['status']}}" class ="form-control" placeholder="status" required>
  </div> -->

  <!-- <div class="modal-footer"> -->
  <div class="modal-footer">
    <!-- <button type="button" href="/dashboard/pendaftaran" class="btn btn-secondary">Close</button> -->
    <button type="submit" class="btn btn-primary">Save Data</button>
  </div>
</form>
@endsection