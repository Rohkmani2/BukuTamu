@extends('layouts.main')

@section('content')
            <div class="row">
                <div class="col-lg-8">
                  <!-- Form Basic -->
                  <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Buat Pesan</h6>
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
        <form method="post" action="/add">
            @csrf
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputName">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputName" aria-describedby="name"
                    placeholder="Masukan nama anda">
                </div>
                <div class="card mb-3">
                <label class="input-group-text" for="exampleInputPassword1">Email</label>
                <input type="enter email" name="email" class="form-control" id="exampleInputNIK" placeholder="email">
                </div>
                <div class="card mb-3">
                    <label class="input-group-text" for="exampleInputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="password"
                        placeholder="Masukan Password Anda min.6 karakter">
                    </div>
                <div class="card mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                </div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/ulasan" class="btn btn-primary">Cancel</a>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection



