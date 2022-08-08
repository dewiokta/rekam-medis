@extends('dashboard.layouts.main')

@section('container')
<a  href="/dashboard/pemeriksaanfree">Kembali</a>
<form action="{{ route('pemeriksaanfree.update',$data->id)  }}" method="post">
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
<br>

  <!-- <div class="modal-footer"> -->
    <div class="modal-footer-left">
        <!-- <button type="button" href="/dashboard/pendaftaran" class="btn btn-secondary">Close</button> -->
        <button type="submit" class="btn btn-primary">Save Data</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>
</form>      
@endsection