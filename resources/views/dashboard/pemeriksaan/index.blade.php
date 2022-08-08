@extends('dashboard.layouts.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pemeriksaan Pasien</h1>
      </div>
      <div class="row justify-content-end">
  <div class="col-md-6">
    <form action="/dashboard/pemeriksaan">
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
              <th scope="col">Nama</th>
              <th scope="col">Nik</th>
              <th scope="col">Kepala Keluarga</th>
              <th scope="col">Alamat</th>
              <th scope="col">keluhan</th>
              <th scope="col">Pemeriksaan</th>
              <th scope="col">Diagnosa</th>
              <th scope="col">Jumlah Kunjungan</th>
              <th scope="col">Terapi</th>
              <th scope="col">Biaya dan Keterangan</th>
              <th scope="col">Action</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
           @if ($pemeriksaan->count()>0)
          @foreach($pemeriksaan as $key=>$item)
          <tbody>
            <tr>
              <td>{{ $loop -> iteration}}</td>
              <!-- pendaftaran -->
              <td>{{ $item -> tanggal }}</td>
              <td>{{ $item -> nama_pasien }}</td>
              <td>{{ $item -> nik }}</td>
              <td>{{ $item -> kepala_keluarga }}</td>
              <td>{{ $item -> alamat }}</td>
              <td>{{ $item -> keluhan }}</td>
              <!-- pemeriksaan -->
              <td>{{ $item -> pemeriksaan }}</td>
              <td>{{ $item -> diagnosa }}</td>
              <td>{{ $item -> jml_kunjungan }}</td>
              <td>{{ $item -> terapi }}</td>
              <td>{{ $item -> biaya_keterangan }}</td>
              <td>
                 <form action="{{ route('pemeriksaan.destroy',$item->id)  }}" method="post" onsubmit="return confirm('Yakin Hapus Data?')">
                    
                    <a class="btn btn-primary" href="{{ route('pemeriksaan.edit',$item->id)  }}">Edit</a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>               
              </td>
              <td>
                 <form action="{{ url('/dashboard/pemeriksaan/done/' . $item->id) }}" method="GET" onsubmit="return confirm('Apakah Data Sudah Benar?')">
                    <button type="submit" class="btn btn-danger">Selesai</button>
                </form>               
              </td>
            </tr>
          </tbody>
          @endforeach
          @endif
        </table>
        {{$pemeriksaan->links()}}
      </div>
@endsection