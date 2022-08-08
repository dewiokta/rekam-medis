    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
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
            <a class="nav-link {{Request::is('dashboard/pemeriksaanfree') ? 'active' : '' }}" href="/dashboard/pemeriksaanfree">
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
            <a class="nav-link {{Request::is('dashboard/riwayatbpjs') ? 'active' : '' }}" href="/dashboard/riwayatbpjs">
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
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
      </div>
    </nav>