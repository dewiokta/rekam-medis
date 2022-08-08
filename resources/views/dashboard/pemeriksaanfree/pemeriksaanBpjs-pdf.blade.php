

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

<h1>Pemeriksaan Bpjs</h1>
<div class="table-responsive">
<table id="customers">
  <tr>
    <th>No</th>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Nik</th>
              <th>Kepala Keluarga</th>
              <th>Alamat</th>
              <th>keluhan</th>
              <th>Pemeriksaan</th>
              <th>Diagnosa</th>
              <th>Jumlah Kunjungan</th>
              <th>Terapi</th>
  </tr>
  @foreach($data as $key=>$item)
  @php
  $no=1;
  @endphp
<tr>
    <td>{{ $no++}}</td>
              <td>{{ $item -> tanggal }}</td>
              <td>{{ $item -> nama_peserta }}</td>
              <td>{{ $item -> nomer_peserta }}</td>
              <td>{{ $item -> kepala_keluarga }}</td>
              <td>{{ $item -> alamat }}</td>
              <td>{{ $item -> keluhan }}</td>
              <td>{{ $item -> pemeriksaan }}</td>
              <td>{{ $item -> diagnosa }}</td>
              <td>{{ $item -> jml_kunjungan }}</td>
              <td>{{ $item -> terapi }}</td>
  </tr>
  @endforeach
  
</table>
</div>
</body>
</html>


