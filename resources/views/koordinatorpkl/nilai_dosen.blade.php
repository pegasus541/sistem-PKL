@extends('layouts.app')
@section('content')
<!DOCTYPE html>
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
  <style>
        /* Inline CSS */
        .dataTables_filter {
            float: right;
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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
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
                                <h3 class="card-title">Tabel Nilai UTS</h3>
                            </div>
                            <div class="card-body">
                                <table id="uts-dosen" class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kelas</th>                                     
                                        <th>Tempat PKL</th>
                                        <th>Nilai</th>
                                        <th>Pembimbing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilaiutsdosens as $nilaiutsdosen)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nilaiutsdosen->nim }}</td>
                                        <td>{{ $nilaiutsdosen->nama }}</td>
                                        <td>{{ $nilaiutsdosen->kelas }}</td>
                                        <td>{{ $nilaiutsdosen->mitra }}</td>
                                        <td>{{ $nilaiutsdosen->nilai_uts_dosen }}</td>
                                        <td>{{ $nilaiutsdosen->pembimbing }}</td>
                                        </tr>
                                        @endforeach
                                        
                                        <!-- Tambahkan data nilai mahasiswa lainnya di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Nilai UAS</h3>
                            </div>
                            <div class="card-body">
                                <table id="uas-dosen" class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kelas</th>                                     
                                        <th>Tempat PKL</th>
                                        <th>Nilai</th>
                                        <th>Nama Dosen Pembimbing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilaiuasdosens as $nilaiuasdosen)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nilaiuasdosen->nim }}</td>
                                        <td>{{ $nilaiuasdosen->nama }}</td>
                                        <td>{{ $nilaiuasdosen->kelas }}</td>
                                        <td>{{ $nilaiuasdosen->mitra }}</td>
                                        <td>{{ $nilaiuasdosen->nilai_uas_dosen }}</td>
                                        <td>{{ $nilaiuasdosen->pembimbing }}</td>
                                        </tr>
                                        @endforeach
                                        
                                        <!-- Tambahkan data nilai mahasiswa lainnya di sini -->
                                    </tbody>
                                </table>
                            </div>
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
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#uts-dosen').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]], // Define the options for rows per page
            "info": true,
            "responsive": true,
            "ordering": true,
            "autoWidth": false,
        });
    });

    $(document).ready(function () {
        $('#uas-dosen').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]], // Define the options for rows per page
            "info": true,
            "responsive": true,
            "ordering": true,
            "autoWidth": false,
        });
    });
</script>


</body>
</html>
@endsection