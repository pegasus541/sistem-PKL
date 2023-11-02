@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi PKL | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 

  <!-- Main Sidebar Container -->
  <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
    



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengajuan SKBPKL</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulir Pengajuan SKBPKL') }}</div>

                <div class="card-body">
                    <!-- <div class="form-group d-flex justify-content-between align-items-center">
                        <label>Surat Keterangan Bebas Tanggungan PKL</label>
                        <div class="ml-auto">
                             <a href="{{ asset('dokumen_pkl/11-Surat-Keterangan-Bebas-Tanggungan-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                        </div>
                    </div> -->

                    <form method="POST" action="{{ route('form-pkl') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>                                
                                <select class="form-control" name="nama" id="nama" required>
                                        <option value="">Pilih Mahasiswa</option>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <option value="{{ $mahasiswa->nama }}" data-nim="{{ $mahasiswa->nim }}" data-kelas="{{ $mahasiswa->kelas }}">{{ $mahasiswa->nama }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nim">NIM Mahasiswa</label>
                                <input type="text" class="form-control" name="nim" id="nim" required>
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" required>
                            </div>

                        
                            <div class="form-group">
                                <label for="lembar_pengesahan_laporan_pkl">Scan Lembar Pengesahan Laporan PKL (sudah bertanda tangan dan stempel)*</label>
                                <input type="file" class="form-control-file" name="lembar_pengesahan_laporan_pkl" id="lembar_pengesahan_laporan_pkl" required>
                            </div>

                            <div class="form-group">
                                <label for="dokumen_bebas_tanggungan_perusahaan">Upload Dokumen Bebas Tanggungan Perusahaan</label>
                                <input type="file" class="form-control-file" name="dokumen_bebas_tanggungan_perusahaan" id="dokumen_bebas_tanggungan_perusahaan" required>
                            </div>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                    <script>
                                                                        
                                    // Kode untuk mengatur pilihan Kontak Perusahaan
                                        var namaMahasiswaSelect1 = document.getElementById('nama');
                                        var nimMahasiswaInput1 = document.getElementById('nim');
                                        var kelasMahasiwaInput1 = document.getElementById('kelas'); // Tambahkan input untuk menyimpan ID mitra

                                        namaMahasiswaSelect1.addEventListener('change', function () {
                                            var selectedOption = this.options[this.selectedIndex];
                                            var nimMahasiswa = selectedOption.getAttribute('data-nim');
                                            var kelasMahasiwa = selectedOption.getAttribute('data-kelas'); 
                                            nimMahasiswaInput1.value = nimMahasiswa || '';
                                            kelasMahasiwaInput1.value = kelasMahasiwa || '';
                                           
                                        });  
                              
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('components.footer')
  <!-- /.main-footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
@endsection