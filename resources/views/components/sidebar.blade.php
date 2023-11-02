  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

@if (Auth::user())
<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
  <!-- Brand Logo -->
  <a class="brand-link">
    <img src="{{ asset('assets/dist/img/logo_jtd.png') }}" alt="Logo JTD" class="brand-image img-circle elevation-3" style="opacity: .9">
    <span class="brand-text font-weight-light">Sistem Informasi PKL</span>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar" >
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- user role mahasiswa -->
        @if (!is_null($user) && $user->role == "mahasiswa")
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-edit "></i>
            <p>Pendaftaran PKL
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{('proposal-pkl')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengajuan Proposal</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('pendaftaran-pkl')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pendataan PKL</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('pembimbing-pkl')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pembimbing PKL</p>
                  </a>
              </li>
          </ul> 
        </li>
        <li class="nav-item">
          <a href="{{route('mitra')}}" class="nav-link text-white">
            <i class="nav-icon fas fa-building "></i>
            <p>Mitra</p>                   
          </a> 
        </li>
        <li class="nav-item">
          <a href="{{route('dokumenPKL')}}" class="nav-link text-white">
            <i class="nav-icon fas fa-archive "></i>
            <p>Dokumen PKL</p>               
          </a> 
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-file-contract "></i>
            <p>SKBPKL
              <i class="right fas fa-angle-left"></i>
            </p>                 
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{route('SKBPKL')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengajuan SKBPKL</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Validasi SKBPKL</p>
                  </a>
              </li>              
          </ul> 
        </li>
        @endif
        <!-- user role koordinator -->
        @if (!is_null($user) && $user->role == "koordinator")
            <li class="nav-item">
              <a href="{{route('mahasiswa')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-users"></i>
                <p>Mahasiswa</p>                    
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('dosen')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-user"></i>
                <p>Dosen</p>                    
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('suratTugas')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-file-invoice "></i>
                <p>Plotting Dosen</p>                
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('dataPkl')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-print "></i>
                <p>Data PKL</p>               
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('nilaiDosen')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-file"></i>
                <p>Nilai Dosen Pembimbing</p>                 
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('nilaiMitra')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-pen "></i>
                <p>Nilai Pembimbing Mitra</p>                    
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('nilaiAll')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-file-excel "></i>
                <p>Nilai All</p>                   
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('skbpklKoor')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-file-signature "></i>
                <p>SKBPKL</p>                   
              </a> 
            </li>
            @endif
            <!-- user role dosen -->
            @if (!is_null($user) && $user->role == "dosen")
            <li class="nav-item">
              <a href="{{route('mahasiswa_dosen')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-user-friends "></i>
                <p>Mahasiswa Bimbingan</p>                
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('penilaian_dosen')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-pen-fancy "></i>
                <p>Penilaian Mahasiswa</p>                  
              </a> 
            </li>
            @endif
            @if (!is_null($user) && $user->role == "mitra")
            <li class="nav-item">
              <a href="{{route('mahasiswa_mitra')}}" class="nav-link text-white">
                <i class="nav-icon fas fa-user-tie "></i>
                <p>Mahasiswa PKL</p>                  
              </a> 
            </li>
            <li class="nav-item">
              <a href="{{route('penilaian_mitra')}}" class="nav-link text-white">
              <i class="nav-icon fas fa-pen-alt "></i>
              <p>Penilaian Mahasiswa PKL</p>                  
            </a> 
          </li>
            @endif
          </ul>
        </nav>
    </div>
</aside>
  <!-- /.sidebar-menu -->
  @endif