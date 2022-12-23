@extends('layouts.main')

@section('content')
<!-- page content -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Welcome Back, {{ auth()->user()->nama }}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengguna</div>
                    <h2>{{ $jml_user }}</h2>
                    <a href="/tamu" class="text-xs font-weight-bold text-uppercase mb-1">Lihat Detail</a>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Kunjungan</div>
                        <h2>{{ $jml_tamu }}</h2>
                        <a href="/tamu" class="text-xs font-weight-bold text-uppercase mb-1">Lihat Detail</a>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pesan</div>
                    <h2>{{ $jml_ulasan }}</h2>
                    <a href="/ulasan" class="text-xs font-weight-bold text-uppercase mb-1">Lihat Detail</a>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>
<!---Container Fluid-->
<!-- page content -->
@endsection
