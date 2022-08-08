@extends('dashboard.layouts.main')

@section('container')
<a  href="/dashboard/obat">Kembali</a>
<form action="{{ route('obat.update',$data->id)  }}" method="post">
{{ csrf_field() }}
      {{ method_field('PUT') }}
  <div class="form-group">
    <label>Nama Obat</label>
    <input type="text" name="nama" value="{{$data['nama']}}" class ="form-control" required>
  </div>
  <div class="form-group">
    <label>Harga Obat</label>
    <input type="text" name="harga" value="{{$data['harga']}}" class ="form-control" required>
  </div>
  <!-- <div class="modal-footer"> -->
    <div class="modal-footer">
        <!-- <button type="button" href="/dashboard/pendaftaran" class="btn btn-secondary">Close</button> -->
        <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
</form>      
@endsection