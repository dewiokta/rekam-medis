 @extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengaturan User</h1>
      </div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>
<!-- Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
{{ csrf_field() }}
      <div class="modal-body">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" class ="form-control" placeholder="Nama" required>
  </div>
  <div class="form-group">
    <label for="floatingInput">Email address</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" email="name@example.com" autofocus required value="{{ old ('email')}}" placeholder="Email">
      
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
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


 <div class="table-responsive">
        <!-- <table class="table table-striped table-sm"> -->
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama User</th>
              <th scope="col">Email</th>
              <th scope="col">Password</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          @if (count($user) > 0)
          @foreach($user as $key=>$item)
          <tbody>
            <tr>
              <td>{{ $loop -> iteration}}</td>
              <td>{{ $item -> name }}</td>
              <td>{{ $item -> email }}</td>
              <td>*******</td>
              <td>
                 <form action="{{ route('user.destroy',$item->id)  }}" method="post" onsubmit="return confirm('Apakah Data Sudah Benar?')">
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
      </div>
      @endsection