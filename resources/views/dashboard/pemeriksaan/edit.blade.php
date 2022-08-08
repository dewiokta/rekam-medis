@extends('dashboard.layouts.main')

@section('container')
<a  href="/dashboard/pemeriksaan">Kembali</a>
<form action="{{ route('pemeriksaan.update',$data->id)  }}" method="post">
{{ csrf_field() }}
      {{ method_field('PUT') }}
  <div class="form-group">
    <label>Pemeriksaan</label>
    <input type="text" name="pemeriksaan" value="{{$data['pemeriksaan']}}" class ="form-control" placeholder="Pemeriksaan" required>
  </div>
  <div class="form-group">
    <label>Diagnosa</label>
    <input type="text" name="diagnosa" value="{{$data['diagnosa']}}" class ="form-control" placeholder="Diagnosa" required>
  </div>
  <div class="form-group">
    <label>Jumlah Kunjungan</label>
    <input type="number" name="jml_kunjungan" value="{{$data['jml_kunjungan']}}" class ="form-control" placeholder="Jumlah Kunjungan" required>
  </div>
  <div class="form-group">
    <label>Terapi</label>
    <input type="text" name="terapi" value="{{$data['terapi']}}" class ="form-control" placeholder="Terapi" required>
  </div>
  <div class="form-group">
    <label>Biaya dan Keterangan</label>
    <input type="text" name="biaya_keterangan" value="{{$data['biaya_keterangan']}}" class ="form-control" placeholder="Biaya dan Keterangan" required>
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