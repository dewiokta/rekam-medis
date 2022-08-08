@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Obat</h1>
</div>

<!-- <button type="button" class="btn btn-primary">Tambah Data</button> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Obat
</button>
<!-- Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('obat.store') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Obat" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Obat</label>
                        <input type="text" name="harga" class="form-control" placeholder="Harga Obat" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row justify-content-end">
    <div class="col-md-6">
        <form action="/dashboard/pendaftaran" method="GET">
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
                <th scope="col">Nama Obat</th>
                <th scope="col">Harga Obat</th>
        </thead>
        @if (count($obat) > 0)
        @foreach($obat as $key=>$item)
        <tbody>
            <tr>
                <td>{{ $loop -> iteration}}</td>
                <td>{{ $item -> nama }}</td>
                <td>{{ $item -> harga }}</td>
                <td>
                    <form action="{{ route('obat.destroy',$item->id)  }}" method="post" onsubmit="return confirm('Yakin Hapus Data?')">
                        <a class="btn btn-primary" href="{{ route('obat.edit',$item->id)  }}">Edit</a>
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
    {{$obat->links()}}
</div>

@endsection