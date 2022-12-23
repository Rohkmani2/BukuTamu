@extends('layouts.main')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Admin</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
      </ol>
    </div>
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
          <button class="btn btn-sm btn-primary" style="float: lift" data-bs-toggle="modal" data-bs-target="#useraddmodal">Tambah</button>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Password</th>
                  <th>Status</th>
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
                @foreach($user as $poin )
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $poin->nama }}</td>
                  <td>{{ $poin->email }}</td>
                  <td>{{ $poin->telepon }}</td>
                  <td>{{ $poin->password }} </td>
                  <td>{{ $poin->level }}</td>
                  <td>
                    <botton class="btn btn-success"data-bs-toggle="modal" data-bs-target="#detailmodal{{ $poin->id }}">Detail</botton>
                    <botton class="btn btn-info"data-bs-toggle="modal" data-bs-target="#updatemodal{{ $poin->id }}">Ubah</botton>
                    <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmodal{{ $poin->id }}">Hapus</botton>
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
<div class="modal fade" id="useraddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulir Data Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/daftar">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror" name="nama" id="exampleInputFirstName" placeholder="Masukan Nama Anda" value="{{ old('nama') }}">
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Masukan Alamat Email" value="{{ old('email') }}">
                @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="exampleInputLastName" placeholder="Masukan No Hp Anda" value="{{ old('telepon') }}">
                @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="form-group">
              <label>Kata Sandi</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword" placeholder="Masukan kata sandi Anda" value="{{ old('password') }}">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <button type="submit" class="btn btn-primary">Buat</button>
          </form>
      </div>
    </div>
  </div>
</div>

@foreach($user as $val => $poin)
<!-- Modal -->
<div class="modal fade" id="updatemodal{{ $poin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isikan Data Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/ubah/{{ $poin->id }}">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror" name="nama" id="exampleInputFirstName" placeholder="Masukan Nama Anda" value="{{ $poin->nama }}">
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Masukan Alamat Email" value="{{ $poin->email }}">
                @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="exampleInputLastName" placeholder="Masukan No Hp Anda" value="{{ $poin->telepon }}">
                @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="form-group">
              <label>Kata Sandi</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword" placeholder="Masukan kata sandi Anda" value="{{ $poin->password }}">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control @error('level') is-invalid @enderror" name="level" id="exampleInputPassword" placeholder="Status Anda Saat ini" value="{{ $poin->level }}">
                @error('level')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            <button type="submit" class="btn btn-primary">Buat</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($user as $val => $poin)
<!-- Modal -->
<div class="modal fade" id="detailmodal{{ $poin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/ubah/{{ $poin->id }}">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror" name="nama" id="exampleInputFirstName" placeholder="Masukan Nama Anda" value="{{ $poin->nama }}">
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Masukan Alamat Email" value="{{ $poin->email }}">
                @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="exampleInputLastName" placeholder="Masukan No Hp Anda" value="{{ $poin->telepon }}">
                @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            <div class="form-group">
              <label>Kata Sandi</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword" placeholder="Masukan kata sandi Anda" value="{{ $poin->password }}">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control @error('level') is-invalid @enderror" name="level" id="exampleInputPassword" placeholder="Status Anda Saat ini" value="{{ $poin->level }}">
                @error('level')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($user as $pin => $poin)
<!-- Modal -->
<div class="modal fade" id="delmodal{{ $poin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/del/{id}">
            @method('DELETE')
            @csrf
            <a href="/del/{{ $poin->id }}" class="btn btn-danger">Ya</a>
            <a href="/users" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach

    @yield('layouts.script')
  <script>
    $(document).ready(function () {
        $('addform').on('click','addbtn', function(e){
            e.preventDeafault();

            $ajax({
                type:"post",
                url:"/useradd",
                data: $('#addform').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#useraddmodal').modal(hide)
                    alert('Data Tersimpan');
                    location.reload();
                },
                error function(error){
                    console.log(error)
                    alert("Data Tidak Tersimpan");

                }
            });
        });
    });
  </script>
@endsection
