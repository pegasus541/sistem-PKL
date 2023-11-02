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
                <div class="card-header">
                  <h3 class="card-title">Plotting Dosen Pembimbing</h3>
                </div>
                  <div class ="card-body">                    
                      <!-- Daftar Kelompok PKL -->                                       
                              <table id="tabel-pendaftaran" class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Mahasiswa 1</th>
                                          <th>Mahasiswa 2</th>
                                          <th>Mahasiswa 3</th>
                                          <th>Mahasiswa 4</th>
                                          <th>Mahasiswa 5</th>
                                          <th>Perusahaan</th>
                                          <th>Dosen Pembimbing</th>
                                          
                                      </tr>
                                  </thead> 
                                  <tbody>                                      
                                    @foreach($pendaftaranpkls as $pendaftaranpkl)    
                                        <tr> 
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_1 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_2 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_3 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_4 }}</td>
                                            <td>{{ $pendaftaranpkl->identitas_mahasiswa_5 }}</td> 
                                            <td>{{ $pendaftaranpkl->nama_perusahaan_tempat_pkl }}</td>
                                            <td>
                                                <button class="btn btn-info" id="choose_dosen" onClick="handleChooseDosen({{ $loop->iteration }})">Pilih Dosen</button>
                                                  <form method="POST" action="{{ route('plotting') }}" id="selected_form_{{ $loop->iteration }}" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="mahasiswa_1" value="{{ $pendaftaranpkl->identitas_mahasiswa_1 }}">
                                                    <input type="hidden" name="mahasiswa_2" value="{{ $pendaftaranpkl->identitas_mahasiswa_2 }}">
                                                    <input type="hidden" name="mahasiswa_3" value="{{ $pendaftaranpkl->identitas_mahasiswa_3 }}">
                                                    <input type="hidden" name="mahasiswa_4" value="{{ $pendaftaranpkl->identitas_mahasiswa_4 }}">
                                                    <input type="hidden" name="mahasiswa_5" value="{{ $pendaftaranpkl->identitas_mahasiswa_5 }}">
                                                    <input type="hidden" name="perusahaan" value="{{ $pendaftaranpkl->nama_perusahaan_tempat_pkl }}">
                                                    <input type="hidden" name="id_pendaftaran" value="{{ $pendaftaranpkl->id }}">
                                                    <input type="hidden" name="id_mitra" value="{{ $pendaftaranpkl->id_mitra }}">                                                    
                                                    <select name="id_dosen" id="id_dosen_{{ $loop->iteration}}" onChange="handleChangeDosen({{ $loop->iteration}})">
                                                      <option >Pilih Dosen</option>
                                                      @foreach($dosens as $dosen)
                                                      <option value="{{ $dosen->id }}">                                                                
                                                        {{ $dosen->nama }}
                                                      </option>
                                                      @endforeach
                                                    </select>                                                    
                                                    <input type="hidden" name="dosen_pembimbing" id="dosen_pembimbing_{{ $loop->iteration}}" value= "{{ $dosen->nama }}">
                                                    <button type="submit" class="btn btn-info">Simpan</button>
                                                  </form>
                                            </td>                                              
                                        </tr>
                                    @endforeach                                                                                    
                                  </tbody>
                              </table>
                                <script>
                                  // document.addEventListener("DOMContentLoaded", function() {                           
                                    const btnChooseDosen =  document.querySelector("#choose_dosen")
                                                                
                                    function handleChooseDosen(rowNumber) {
                                        var formId = "selected_form_" + rowNumber;
                                        var formElement = document.getElementById(formId);
                                        
                                        if (formElement.style.display === "none") {
                                            formElement.style.display = "block";
                                        } else {
                                            formElement.style.display = "none";
                                        }
                                    }

                                    function handleChangeDosen(rowNumber){
                                      const selectElement = document.querySelector("#id_dosen_" + rowNumber);
                                      const dosenPembimbingInput = document.querySelector("#dosen_pembimbing_"+rowNumber);
                                      
                                      const selectedOption = selectElement.options[selectElement.selectedIndex];                                       
                                      dosenPembimbingInput.value = selectedOption.textContent;
                                    }
                                  // });'
                                </script>                                                                   
                  </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Plotting Dosen Pembimbing</h3>
                    <a href="{{ route('plotting-export') }}" class="btn btn-success ml-2">Export to Excel</a>
                </div>

                  <div class ="card-body">                    
                      <!-- Daftar Kelompok PKL -->
                                                   
                              <table id="tabel-plotting" class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Mahasiswa 1</th>
                                          <th>Mahasiswa 2</th>
                                          <th>Mahasiswa 3</th>
                                          <th>Mahasiswa 4</th>
                                          <th>Mahasiswa 5</th>
                                          <th>Perusahaan</th>
                                          <th>Dosen Pembimbing</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($plottings as $plotting)
                                      <!-- Ganti dengan data kelompok PKL dari database -->
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $plotting->mahasiswa_1 }}</td>
                                        <td>{{ $plotting->mahasiswa_2 }}</td>
                                        <td>{{ $plotting->mahasiswa_3 }}</td>
                                        <td>{{ $plotting->mahasiswa_4 }}</td>
                                        <td>{{ $plotting->mahasiswa_5 }}</td>
                                        <td>{{ $plotting->perusahaan }}</td>
                                        <td>{{ $plotting->dosen_pembimbing }}</td>
                                      </tr>
                                    @endforeach
                                      <!-- Tambahkan data kelompok PKL lainnya sesuai dengan kebutuhan -->
                                  </tbody>
                              </table>
                                
                                
                           
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
            "responsive": true,
            "ordering": true,
            "autoWidth": false,
        });
    });

    $(document).ready(function () {
        $('#tabel-plotting').DataTable({
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