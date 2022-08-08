<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th{
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Pendaftaran Bpjs</h1>
<div class="table-responsive">
<table id="customers">
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Nama Pasien</th>
    <th>Kepala Keluarga</th>
    <th>Nomer Bpjs</th>
    <th>Tanggal Lahir</th>
    <th>Agama</th>
    <th>Alamat</th>
    <th>Nomer Telepon</th>
    <th>Keluhan</th>
  </tr>
  @foreach($data as $key=>$item)
  @php
  $no=1;
  @endphp
<tr>
    <td>{{ $no++}}</td>
    <td>{{ $item -> tanggal }}</td>
    <td>{{ $item -> nama_peserta }}</td>
    <td>{{ $item -> kepala_keluarga }}</td>
    <td>{{ $item -> nomer_peserta }}</td>
    <td>{{ $item -> tanggal_lahir }}</td>
    <td>{{ $item -> agama }}</td>
    <td>{{ $item -> alamat }}</td>
    <td>{{ $item -> nomer_telepon }}</td>
    <td>{{ $item -> keluhan }}</td>
  </tr>
  @endforeach
  
</table>
</div>
</body>
</html>


