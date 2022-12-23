<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link href="/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="img/logo/indramayu.png" rel="icon">
    <title>SIPETAKON - Dashboard</title>
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

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <!-- TOP NAV -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i>
                        diskominfoindramayu@gmail.com</p>
                    <p> <i class='bx bxs-phone-call'></i> 08111333314</p>
                </div>
                <div class="col-auto social-icons">
                            <a href="https://id-id.facebook.com/diskominfo.indramayu/"><i class='bx bxl-facebook'></i></a>
                            <a href="https://twitter.com/indramayukab"><i class='bx bxl-twitter'></i></a>
                            <a href="https://www.instagram.com/diskominfoindramayu/"><i class='bx bxl-instagram'></i></a>
                            <a href="https://www.youtube.com/@diskominfoindramayu8327/featured"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="https://diskominfo.indramayukab.go.id/">Dinas Komunikasi dan Informatika<span class="dot">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kunjungan">Mengisi Kunjungan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bukutamu">Daftar Tamu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">SELAMAT DATANG DI </h6>
                        <h1 class="display-3 my-4">Dinas Komunikasi dan<br/> Informatika</h1>
                        <div class="btn">
                            <a class="btn-brand nav-link" href="#kunjungan">Mengisi Kunjungan</a>
                        </div>
                        <botton class="btn btn-outline-light ms-3" data-bs-toggle="modal" data-bs-target="#tambahmodal">Pesan</botton>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white">
                        <h6 class="text-white text-uppercase">SELAMAT DATANG DI</h6>
                        <h1 class="display-3 my-4">Dinas Komunikasi dan<br/> Informatika</h1>
                        <div class="btn">
                            <a class="btn-brand nav-link" href="#kunjungan">Mengisi Kunjungan</a>
                        </div>
                        <botton class="btn btn-outline-light ms-3" data-bs-toggle="modal" data-bs-target="#tambahmodal">Pesan</botton>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="kunjungan">
        <p align="center"><b>Mohon isikan data diri Anda</b></p>

        <form method="post" action="/tambah" enctype="multipart/form-data">
            @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div id="my_camera"></div>
                            <br/>
                         <input type=button value="Take Snapshot" onClick="take_snapshot()">
                         <input type="hidden" name="foto_webcam" class="image-tag">
                        </div>
                    <div class="col-md-8">
                        <div id="results">Your captured image will appear here...</div>
                        </div>
                    </div>
                    <input class="col-md-8" name="foto_webcam" type="file" id="webcam" value="{{ old('image') }}">
                </div>
                <div align="center">
                <div class="col-md-8">
                <label class="input-group-text" for="exampleInputName">Nama</label>
                <input type="text" name="nama" @error('nama') is-invalid @enderror" class="form-control" id="exampleInputName" aria-describedby="name"
                    placeholder="Masukan nama anda"value="{{ old('nama') }}">
                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="col-md-8">
                <label class="input-group-text" for="exampleInputName">NIK</label>
                <input type="text" name="nik" @error('nik') is-invalid @enderror" class="form-control" id="exampleInputName" aria-describedby="name"
                    placeholder="Masukan NIK anda" value="{{ old('nik') }}">
                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-8">
                <label class="input-group-text" for="exampleInputName">Alamat</label>
                <input type="text" name="alamat" @error('alamat') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                    placeholder="Masukan alamat anda" value="{{ old('alamat') }}">
                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="col-md-8">
                    <label class="input-group-text" for="exampleInputName">Instansi</label>
                    <input type="text" name="instansi" @error('instansi') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Masukan Instansi anda"value="{{ old('instansi') }}">
                        @error('instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                <div class="col-md-8">
                    <label class="input-group-text" for="inputState" class="form-label">Tanggal Berkunjung</label>
                    <input type="date" name="tanggal" @error('tanggal') is-invalid @enderror" class="form-control" id="simpleDataInput" aria-describedby="date" value="{{ old('tanggal') }}">
                    @error('tanggal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label class="input-group-text" for="inputState" class="form-label">Bidang Terkait</label>
                    <select id="inputState" name="bidang_terkait" @error('bidang_terkait') is-invalid @enderror" class="form-control" value="{{ old('bidang_terkait') }}">
                    <option selected>Pilih Bidang Terkait...</option>
                    <option value="kadis">Kadis</option>
                    <option value="sekretariat">Sekretariat</option>
                    <option value="tik">Bidang TIK</option>
                    <option value="ikp">Bidang IKP</option>
                    <option value="santik">Bidang SANTIK</option>
                    </select>
                    @error('bidang_terkait')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="col-md-8">
                    <label class="input-group-text" for="exampleInputName">Keperluan</label>
                    <input type="text" name="keperluan" @error('keperluan') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Masukan keperluan anda" value="{{ old('keperluan') }}">
                        @error('keperluan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-8">
                        <label class="input-group-text" for="formFile" class="form-label">Foto KTP</label>
                        <input class="form-control" name="foto_ktp" @error('foto_ktp') is-invalid @enderror" type="file" id="image" value="{{ old('foto_ktp') }}">
                        @error('keperluan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                <div class="from-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                </div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>

    <section id="bukutamu">
    <p align="center"><b>DAFTAR TAMU</b></p>

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
    <th>Aksi</th>
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
    <td>
        <botton class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bukamodal{{ $item->id }}">Detail</botton>
        </from>
        </td>
  </tr>
  @endforeach
</table>
</body>

<section id="kontak">
    <p align="center"><b>Masukan pesan yang ingin Anda sampaikan</b></p>
    <div align="center">
    <form method="post" action="/simpan">
    @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
    @csrf
        <div class="col-md-8">
        <label class="input-group-text" for="exampleInputName">Nama</label>
        <input type="text" name="nama" @error('nama') is-invalid @enderror" class="form-control" id="exampleInputName" aria-describedby="name"
            placeholder="Masukan nama anda" value="{{ old('nama') }}">
            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        </div>
        <div class="col-md-8">
        <label class="input-group-text" for="exampleInputName">Email</label>
        <input type="text" name="email" @error('email') is-invalid @enderror" class="form-control" id="exampleInputName" aria-describedby="name"
         placeholder="Masukan email anda" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-8">
            <label class="input-group-text" for="exampleInputName">Kirim Pesan</label>
            <input type="text" name="ulasan" @error('ulasan') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                placeholder="Tulis pesan anda yang ingin disampaikan" value="{{ old('ulasan') }}">
                @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
        <div class="col-md-8">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
            <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
        </div>
        </div class="modal-footer" align="center">
        <button type="submit" class="btn btn-primary">Kirim</button>
         </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan pesan yang ingin Anda disampaikan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/simpan">
            @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
            @csrf
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputName">Nama</label>
                <input type="text" name="nama" @error('nama') is-invalid @enderror"class="form-control" id="exampleInputName" aria-describedby="name"
                    placeholder="Masukan nama anda" value="{{ old('nama') }}">
                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputPassword1">Email</label>
                <input type="enter email" name="email" @error('email') is-invalid @enderror" class="form-control" id="exampleInputNIK"
                 placeholder="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="exampleInputName">Kirim Pesan</label>
                    <input type="text" name="ulasan" @error('ulasan') is-invalid @enderror"class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Tulis pesan anda yang ingin disampaikan" value="{{ old('ulasan') }}">
                        @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                <div class="from-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                </div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
      </div>
    </div>
  </div>
</div>

@foreach($tamu as $key => $item)
<!-- Modal -->
<div class="modal fade" id="bukamodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Diri Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/update/{{ $item->id }}" enctype="multipart/form-data">
            @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                   @csrf
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputName">Nama</label>
                <input type="text" name="nama" @error('nama') is-invalid @enderror" class="form-control" id="exampleInputName" aria-describedby="name"
                    placeholder="Masukan nama anda" value="{{ $item->nama }}">
                </div>
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputPassword1">NIK</label>
                <input type="enter number" name="nik" @error('nik') is-invalid @enderror" class="form-control" id="exampleInputNIK" placeholder="NIK" value="{{ $item->nik }}">
                </div>
                <div clas="card mb-3">
                <label class="input-group-text" for="exampleInputName">Alamat</label>
                <input type="text" name="alamat" @error('alamat') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                    placeholder="Masukan alamat anda" value="{{ $item->alamat }}">
                </div>
                <div clas="card mb-3">
                    <label class="input-group-text" for="exampleInputName">Instansi</label>
                    <input type="text" name="instansi" @error('instansi') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Masukan Instansi anda" value="{{ $item->instansi }}">
                    </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="inputState" class="form-label">Tanggal Berkunjung</label>
                    <input type="date" name="tanggal" @error('tanggal') is-invalid @enderror" class="form-control" id="simpleDataInput" aria-describedby="date" value="{{ $item->tanggal }}">
                </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="inputState" class="form-label">Bidang Terkait</label>
                    <select id="inputState" name="bidang_terkait" @error('bidang_terkait') is-invalid @enderror" class="form-control">
                    <option selected>{{ $item->bidang_terkait }}</option>
                    <option value="kadis">Kadis</option>
                    <option value="sekretariat">Sekretariat</option>
                    <option value="tik">Bidang TIK</option>
                    <option value="ikp">Bidang IKP</option>
                    <option value="santik">Bidang SANTIK</option>
                    </select>
                </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="exampleInputName">Keperluan</label>
                    <input type="text" name="keperluan" @error('keperluan') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Masukan keperluan anda" value="{{ $item->keperluan }}">
                    </div>
                <div class="from-group">
                        <label class="input-group-text" for="formFile" class="form-label">Foto KTP</label>
                    <img src="/foto_ktp/{{ $item->foto_ktp }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
                </div>
                <div class="from-group">
                    <label class="input-group-text" for="formFile" class="form-label">Foto Webcam</label>
                    <img src="{{ asset('foto_webcam/' .$item->foto_webcam) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

    <footer>
        <section id="tentang">
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">Dinas Komunikasi dan Informatika<span class="dot">.</span></h4>
                        <p>Jln. Letjend S. Parman No. 19, Margadadi, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45211
                            Email : diskominfo@indramayukab.go.id
                            Call Center / Whatsapp : 08111333314</p>

                        <div class="col-auto social-icons">
                            <a href="https://id-id.facebook.com/diskominfo.indramayu/"><i class='bx bxl-facebook'></i></a>
                            <a href="https://twitter.com/indramayukab"><i class='bx bxl-twitter'></i></a>
                            <a href="https://www.instagram.com/diskominfoindramayu/"><i class='bx bxl-instagram'></i></a>
                            <a href="https://www.youtube.com/@diskominfoindramayu8327/featured"><i class='bx bxl-youtube'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">©2022 | DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN INDRAMAYU.</a>
        </div>
    </footer>
    @yield('layouts.script')
    <script src="/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/app.js"></script>
    <script language="JavaScript">
        function dataURItoBlob(dataURI) {
            // convert base64 to raw binary data held in a string
            // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
            var byteString = atob(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

            // write the bytes of the string to an ArrayBuffer
            var ab = new ArrayBuffer(byteString.length);

            // create a view into the buffer
            var ia = new Uint8Array(ab);

            // set the bytes of the buffer to the correct values
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            // write the ArrayBuffer to a blob, and you're done
            var blob = new Blob([ab], {type: mimeString});
            return blob;

          }
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

            let fileName = 'webcam.jpg'
            let file = new File([dataURItoBlob(data_uri)], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
            let container = new DataTransfer();
            container.items.add(file);
            document.querySelector('input#webcam').files = container.files
            //document.querySelector('input#webcam')[0].setAttribute('value', data_uri)

//            document.querySelector('input#webcam').change()
        } );

        Webcam.reset();
    }

   function saveSnap(){
      // Get base64 value from <img id='imageprev'> source
      var base64image = document.getElementById("imageprev").src;

      Webcam.upload( base64image, '{{ url('tambah') }}', function(code, text) {
           console.log('Save successfully');
          //console.log(text);
      });

   }
</script>
</body>
</html>

