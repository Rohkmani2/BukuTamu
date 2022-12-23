@extends('layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Pesan</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pesan</li>
      </ol>
    </div>
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesan</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <botton class="btn btn-primary" style="float: lift" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah</botton>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Pesan</th>
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
                @foreach( $ulasan as $data )
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->ulasan }}</td>
                  <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lihatmodal{{ $data->id }}">Detail</button>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#gantimodal{{ $data->id }}">Ubah</button>
                    <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apusmodal{{ $data->id }}">Hapus</botton>
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


<!-- Modal -->
<div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi Data Pesan Anda yang ingin disampaikan</h5>
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

@foreach($ulasan as $icon => $data)
<!-- Modal -->
<div class="modal fade" id="gantimodal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isikan Data Pesan yang ingin diubah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/updatedata/{{ $data->id }}">
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
                    placeholder="Masukan nama anda" value="{{ $data->nama }}">
                </div>
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputPassword1">Email</label>
                <input type="enter email" name="email" @error('email') is-invalid @enderror" class="form-control" id="exampleInputNIK" placeholder="email" value="{{ $data->email }}">
                </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="exampleInputName">Kirim Pesan</label>
                    <input type="text" name="ulasan" @error('ulasan') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Kirim pesan anda" value="{{ $data->ulasan }}">
                    </div>
                <div class="from-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                </div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($ulasan as $icon => $data)
<!-- Modal -->
<div class="modal fade" id="lihatmodal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Pesan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/updatedata/{{ $data->id }}">
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
                    placeholder="Masukan nama anda" value="{{ $data->nama }}">
                </div>
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputPassword1">Email</label>
                <input type="enter email" name="email" @error('email') is-invalid @enderror" class="form-control" id="exampleInputNIK" placeholder="email" value="{{ $data->email }}">
                </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="exampleInputName">Kirim Pesan</label>
                    <input type="text" name="ulasan" @error('ulasan') is-invalid @enderror" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                        placeholder="Kirim pesan anda" value="{{ $data->ulasan }}">
                    </div>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($ulasan as $win => $data)
<!-- Modal -->
<div class="modal fade" id="apusmodal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pesan yang ingin anda hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/apus/{id}">
            @method('DELETE')
            @csrf
            <a href="/apus/{{ $data->id }}" class="btn btn-danger">Ya</a>
            <a href="/ulasan" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach
  @yield('layouts.script')
@endsection
