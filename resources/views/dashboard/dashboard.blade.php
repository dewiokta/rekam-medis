<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekam Medis</title>

    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Rekam Medis</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="navbar-nav">
    <form action="/logout" method="post">
      @csrf
      <button type="submit" class="drop-item"><i class="bibi-box-arrow-right"></i>Logout</button>

    </form>
    <!-- <div class="nav-item text-nowrap" action="/logout" method="post">
      @csrf
      <button type="submit" class="drop-item"><i class="bibi-box-arrow-right"></i>Logout</button> -->
      <!-- <a class="nav-link px-3" href="#">Logout</a> -->
    <!-- </div> -->
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active {{Request::is('dashboard') ? 'active' : ''}} " aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    Pendaftaran
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/pendaftaran') ? 'active' : '' }}" href="/dashboard/pendaftaran">
              <span data-feather="users"></span>
              Umum
            </a>
          </li>
    <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/bpjs') ? 'active' : '' }}" href="/dashboard/bpjs">
              <span data-feather="users"></span>
              Bpjs
            </a>
          </li>
    
  </ul>
</div>
          
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/pemeriksaan') ? 'active' : '' }}" href="/dashboard/pemeriksaan">
              <span data-feather="file-text"></span>
              Pemeriksaan Umum
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/pemeriksaanbpjs') ? 'active' : '' }}" href="/dashboard/pemeriksaanfree">
              <span data-feather="file-text"></span>
              Pemeriksaan Bpjs
            </a>
          </li>
          <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    Riwayat
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/riwayat') ? 'active' : '' }}" href="/dashboard/riwayat">
              <span data-feather="file-text"></span>
              Pemeriksaan Umum
            </a>
          </li>
    <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/bpjs') ? 'active' : '' }}" href="/dashboard/riwayatbpjs">
              <span data-feather="users"></span>
              Pemeriksaan Bpjs
            </a>
          </li>
  </ul>
</div>
<li class="nav-item">
           <a class="nav-link {{Request::is('dashboard/user') ? 'active' : '' }}" href="/dashboard/user">
              <span data-feather="file-text"></span>
              Users
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rekam Medis DPM Dr Dina N R</h1>
      </div>
      <style>
        h5{text-align: center;}
    </style>
    <style>
        p{text-align: center;}
    </style>
      <div class="row">
                <div class="card col-lg-8 col-md-3 col-sm-4 col-6" style="max-width: 15rem;">
    <div class="card-body">
        <h5 class="card-title">Pendaftaran</h5>
        <p>{{ $pendaftaran }}</p>
        
    </div>
</div>
<div class="card col-lg-8 col-md-3 col-sm-4 col-6" style="max-width: 15rem;">
    <div class="card-body">
        <h5 class="card-title">Bpjs</h5>
        <p>{{ $bpjs }}</p>
        
    </div>
</div>
<div class="card col-lg-8 col-md-3 col-sm-4 col-6" style="max-width: 15rem;">
    <div class="card-body">
        <h5 class="card-title">Pemeriksaan Umum</h5>
        <p>{{ $pemeriksaan }}</p>
        
    </div>
</div>
<div class="card col-lg-8 col-md-3 col-sm-4 col-6" style="max-width: 20rem;">
    <div class="card-body">
        <h5 class="card-title">Pemeriksaan Bpjs</h5>
        <p>{{ $pemeriksaanfree }}</p>
        
    </div>
</div>
                
            </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="/js/dashboard.js"></script>
  </body>
</html>
