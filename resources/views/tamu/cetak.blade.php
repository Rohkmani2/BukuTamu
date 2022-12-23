<!DOCTYPE html>
<html>
    <head>
        <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #aa0404;
  color: white;
}
</style>
</head>
<body>
    <p align="center"><b>LAPORAN DATA TAMU</b></p>
<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIK</th>
    <th>Alamat</th>
    <th>Instansi</th>
    <th>Tanggal Berkunjung</th>
    <th>Bidang Terkait</th>
    <th>Keperluan</th>
    <th>Foto KTP</th>
    <th>Foto Webcam</th>
  </tr>
  @foreach($tamu as $item )
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $item->nama }}</td>
    <td>{{ $item->nik }}</td>
    <td>{{ $item->alamat }}</td>
    <td>{{ $item->instansi }}</td>
    <td>{{ $item->tanggal }}</td>
    <td>{{ $item->bidang_terkait }}</td>
    <td>{{ $item->keperluan }}</td>
    <td> <img src="{{ asset('foto_ktp/' .$item->foto_ktp) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="" </td>
    <td> <img src="{{ asset('foto_webcam/' .$item->foto_webcam) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="" </td>
  </tr>
  @endforeach
</table>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>
