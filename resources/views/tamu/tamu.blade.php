@extends('layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Buku Tamu</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buku Tamu</li>
      </ol>
    </div>
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Tamu</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
          <a href="/cetak" target="_blank" style="float: lift" class="btn btn-primary">Print</a>
          <a href="{{ url('unduh-Laporan-Data-Tamu-pdf') }}" style="float: lift" target="_blank"><button class="btn btn-danger">PDF</button>
            </a>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Alamat</th>
                  <th>Instansi</th>
                  <th>Tanggal Berkunjung</th>
                  <th>Bidang Terkait</th>
                  <th>Keperluan<th>
                  <th>Foto KTP</th>
                  <th>Foto Webcam</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if ($message = Session::get('success'))
                     <div class="alert alert-success">
                         <p>{{ $message }}</p>
                      </div>
                @endif
                @php
                    $no=1;
                @endphp
                @foreach($tamu as $item )
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->nik }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->instansi }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>{{ $item->bidang_terkait }}</td>
                  <td>{{ $item->keperluan }}</td>
                  <td></td>
                  <td> <img src="{{ asset('foto_ktp/' .$item->foto_ktp) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""</td>
                  <td> <img src="{{ asset('foto_webcam/' .$item->foto_webcam) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""</td>
                  <td>
                    <botton class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bukamodal{{ $item->id }}">Detail</botton>
                    <botton class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ubahmodal{{ $item->id }}">Ubah</botton>
                    <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusmodal{{ $item->id }}">Hapus</botton>
                    </from>
                    </td>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>

@foreach($tamu as $key => $item)
<!-- Modal -->
<div class="modal fade" id="ubahmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isikan Data Anda yang ingin diubah</h5>
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
                <div class="card mb-3">
                    <label class="input-group-text" for="formFile" class="form-label">Foto KTP</label>
                    <input class="form-control" name="foto_ktp" @error('foto_ktp') is-invalid @enderror" type="file" id="formFile" value="{{ $item->foto_ktp }}">
                </div>
                <div class="from-group">
                    <img src="/foto_ktp/{{ $item->foto_ktp }} " height="10%" width="50%" alt="" srcset="">
                </div>
                <div class="from-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

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
                    <img src="/foto_ktp/{{ $item->foto_ktp }} " height="10%" width="50%" alt="" srcset="">
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($tamu as $pon => $item)
<!-- Modal -->
<div class="modal fade" id="hapusmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tamu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/hapus/{id}">
            @method('DELETE')
            @csrf
            <a href="/hapus/{{ $item->id }}" class="btn btn-danger">Ya</a>
            <a href="/tamu" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach

@yield('layouts.script')
@endsection
