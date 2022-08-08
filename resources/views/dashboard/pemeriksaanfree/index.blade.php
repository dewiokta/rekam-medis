@extends('dashboard.layouts.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pemeriksaan Pasien BPJS</h1>
      </div>
            <div class="table-responsive">
        <!-- <table class="table table-striped table-sm"> -->
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Nama</th>
              <th scope="col">Nomer Peserta BPJS</th>
              <th scope="col">Kepala Keluarga</th>
              <th scope="col">Alamat</th>
              <th scope="col">keluhan</th>
              <th scope="col">Pemeriksaan</th>
              <th scope="col">Diagnosa</th>
              <th scope="col">Jumlah Kunjungan</th>
              <th scope="col">Terapi</th>
              <th scope="col">Action</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
           @if ($pemeriksaanfree->count()>0)
          @foreach($pemeriksaanfree as $key=>$item)
          <tbody>
            <tr>
              <td>{{ $loop -> iteration}}</td>
              <!-- pendaftaran -->
              <td>{{ $item -> tanggal }}</td>
              <td>{{ $item -> nama_peserta }}</td>
              <td>{{ $item -> nomer_peserta }}</td>
              <td>{{ $item -> kepala_keluarga }}</td>
              <td>{{ $item -> alamat }}</td>
              <td>{{ $item -> keluhan }}</td>
              <!-- pemeriksaan -->
              <td>{{ $item -> pemeriksaan }}</td>
              <td>{{ $item -> diagnosa }}</td>
              <td>{{ $item -> jml_kunjungan }}</td>
              <td>{{ $item -> terapi }}</td>
              <td>
                 <form action="{{ route('pemeriksaanfree.destroy',$item->id)  }}" method="post" onsubmit="return confirm('Yakin Hapus Data?')">
                    <a class="btn btn-primary" href="{{ route('pemeriksaanfree.edit',$item->id)  }}">Edit</a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>              
              </td>
              <td>
                 <form action="{{ url('/dashboard/pemeriksaanfree/selesai/' . $item->id) }}" method="GET" onsubmit="return confirm('Apakah Data Sudah Benar?')">
                    <button type="submit" class="btn btn-danger">Selesai</button>
                </form>               
              </td>
            </tr>
          </tbody>
          @endforeach
          @endif
        </table>
      </div>
@endsection