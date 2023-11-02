@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<!--
Halaman ini adalah halaman Pendaftaran PKl yang berisi Formulir Pendaftaran PKL
-->
<html lang="en">
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi PKL | Pendaftaran PKL</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Custom CSS -->
  <style>
      .content {
          padding: 20px;
        }
        </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pengajuan Proposal PKL</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            
            <!-- Main content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Form Permintaan Surat Pengantar PKL') }}</div>
                        
                        <div class="card-body">
                            <p>Anda dapat mengakses formulir pengajuan surat pengantar PKL melalui tautan berikut:</p>
                            <a href="https://forms.gle/FuUaJw8gSkdvrEve6" target="_blank" class="btn btn-primary">Buka Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- Add the "Surat Pengantar PKL yang Sudah Diparaf" section -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Surat Pengantar PKL yang Sudah Diparaf') }}</div>
            
                        <div class="card-body">
                            <p>Surat Pengantar PKL yang sudah di paraf oleh admin jurusan dapat diakses melalui tautan berikut:</p>
                            <a href="https://drive.google.com/drive/folders/1YV06-mFzIRns5-nPRVEdX4UdpPM8lLsE?usp=sharing" target="_blank" class="btn btn-primary">Lihat Surat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        

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


