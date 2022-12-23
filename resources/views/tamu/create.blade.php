@extends('layouts.main')

@section('content')
            <div class="row">
                <div class="col-lg-8">
                  <!-- Form Basic -->
                  <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu</h6>
                    </div>
                    <div class="card-body">
                @if (session('success'))
          <div class="alert-success">
            <p>{{ session('success') }}</p>
          </div>
          @endif

          @if ($errors->any())
          <div class="alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
                <div class="card-body">
        <form method="post" action="/tambah" enctype="multipart/form-data">
        @csrf
            <div class="card mb-3">
            <label class="input-group-text" for="exampleInputName">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputName" aria-describedby="name"
                placeholder="Masukan nama anda">
            </div>
            <div class="card mb-3">
            <label class="input-group-text" for="exampleInputPassword1">NIK</label>
            <input type="enter number" name="nik" class="form-control" id="exampleInputNIK" placeholder="NIK">
            </div>
            <div class="card mb-3">
            <label class="input-group-text" for="exampleInputName">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                placeholder="Masukan alamat anda">
            </div>
            <div class="card mb-3">
                <label class="input-group-text" for="exampleInputName">Instansi</label>
                <input type="text" name="instansi" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                    placeholder="Masukan Instansi anda">
                </div>
            <div class="card mb-3">
                <label class="input-group-text" for="inputState" class="form-label">Tanggal Berkunjung</label>
                <input type="date" name="tanggal" class="form-control" id="simpleDataInput" aria-describedby="date">
            </div>
            <div class="card mb-3">
                <label class="input-group-text" for="inputState" class="form-label">Bidang Terkait</label>
                <select id="inputState" name="bidang_terkait" class="form-control">
                <option selected>Pilih Bidang Terkait...</option>
                <option value="kadis">Kadis</option>
                <option value="sekretariat">Sekretariat</option>
                <option value="tik">Bidang TIK</option>
                <option value="ikp">Bidang IKP</option>
                <option value="santik">Bidang SANTIK</option>
                </select>
            </div>
            <div class="card mb-3">
                <label class="input-group-text" for="exampleInputName">Keperluan</label>
                <input type="text" name="keperluan" class="form-control" id="exampleInputAdress" aria-describedby="adress"
                    placeholder="Masukan keperluan anda">
                </div>
            <div class="card mb-3">
                <label class="input-group-text" for="formFile" class="form-label">Foto KTP</label>
                <input class="form-control" name="foto_ktp" type="file" id="image">
            </div>
            <div class="card mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
            </div>
            </div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/tamu" class="btn btn-primary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@yield('layouts.script')
@endsection



