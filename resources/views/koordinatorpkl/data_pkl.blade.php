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
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">Data Mahasiswa yang diterima PKL</div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <div class="text-right mb-2">
                                  <a href="{{ route('dataPkl-export') }}" class="btn btn-primary">Download</a>
                              </div>
                                <table id="tabel-pendaftaran" class="table table-bordered">
                                    <thead>
                                        <tr>                                            
                                            <th>No.</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Mahasiswa 1</th>
                                            <th>Mahasiswa 2</th>
                                            <th>Mahasiswa 3</th>
                                            <th>Mahasiswa 4</th>
                                            <th>Mahasiswa 5</th>
                                            <th>Mitra</th>
                                            <th>Durasi</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Kontak Perusahaan</th>
                                            <th>Surat Penerimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($pendaftaranpkls as $pendaftaranpkl)   
                                        <tr>                                            
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendaftaranpkl->jumlah_anggota}}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_1 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_2 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_3 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_4 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_5 }}</td>
                                            <td>{{ $pendaftaranpkl->nama_perusahaan_tempat_pkl }}</td>
                                            <td>{{ $pendaftaranpkl->durasi_pkl }}</td>
                                            <td>{{ $pendaftaranpkl->tanggal_mulai_pkl }}</td>
                                            <td>{{ $pendaftaranpkl->tanggal_selesai_pkl}}</td>
                                            <td>{{ $pendaftaranpkl->kontak_perusahaan}}</td>
                                            <td>
                                                {{ $pendaftaranpkl->surat_penerimaan}}
                                              <button type="button" class="btn btn-primary preview-button" data-toggle="modal" data-target="#previewModal">
                                                Preview
                                              </button>
                                            </td>

                                        </tr>
                                        @endforeach
                                        <!-- Tambahkan data lainnya sesuai kebutuhan -->
                                    </tbody>
                                </table>
                                <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Preview Surat Penerimaan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <iframe src="https://docs.google.com/viewer?url={{ asset('SuratPenerimaan/' . $pendaftaranpkl->surat_penerimaan) }}&embedded=true" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                            </div>
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
        $('#tabel-pendaftaran').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]], // Define the options for rows per page
            "info": true,
            "responsive": false,
            "ordering": true,
            "autoWidth": false,
        });
    });
</script>

</body>
</html>
@endsection