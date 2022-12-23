<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/indramayu.png" rel="icon">
  <title>SIPETAKON - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-4 col-md-5">
          <div class="card shadow-sm my-5">
            <div class="card-body p-0">
              <div class="row w-100 mx-0">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">DAFTAR</h1>
                  </div>
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
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/login">Apakah anda sudah punya akun?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>
