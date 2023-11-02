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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dokumen Pendukung PKL</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nama Dokumen</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Persyaratan Ujian PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/1-Persyaratan-ujian-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Tata Tertib Ujian PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/2-Tata-tertib-Ujian-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Berita Acara Ujian PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/3-Berita-acara-ujian-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Lembar Persetujuan Maju Ujian PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/4-Lembar-persetujuan-ujian-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Form Nilai Pembimbing PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/5-Nilai-pembimbing-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Lembar Revisi Ujian PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/6-Lembar-revisi-Ujian-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Materi Ujian PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Log Sheet PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/7-Log-Sheet-PKL 2023.doc') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Surat Bebas Tanggungan dari Instansi</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/8-Surat-bebas-tanggungan-instansi-PKL 2023.docx') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Cover dan Lembar Pengesahan Laporan</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/9-Cover_Lbr-Pengesahan-Buku-PKL 2023.docx') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Surat Pengunduran Diri</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/10-SURAT_PENGUNDURAN_DIRI_PKL 2023.docx') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Surat Permohonan Reschedule Jadwal PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Surat Izin PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Buku Panduan PKL</td>
                      <td>
                        <a href="{{ asset('dokumen_pkl/PEDOMAN PKL JTD 2022 - FIX UPDATE ---.docx') }}" class="btn btn-primary" download>Download</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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