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
                            <h3 class="card-title">Tabel Nilai UAS Mahasiswa PKL</h3>
                        </div>
                        <div class="card-body">
                          <div class="mb-2">
                            <label for="filterKelas">Filter by Kelas:</label>
                            <select id="filterKelas">
                              <option value="">All</option>
                              <option value="4A">4A</option>
                              <option value="4B">4B</option>
                              <option value="4C">4C</option>
                              <!-- Add more options for other classes if needed -->
                            </select>
                          </div>
                            <button id="exportButton" class="btn btn-success">Export to Excel</button>
                            <table id="nilaiTable" class="mt-2 table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kelas</th>
                                        <th>N1</th>
                                        <th>N2</th>
                                        <th>NR1</th>
                                        <th>NTS</th>
                                        <th>N3</th>
                                        <th>N4</th>
                                        <th>NR2</th>
                                        <th>NAS</th>
                                    </tr>                                
                                </thead>
                                <tbody>
                                
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                               
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
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<!-- <script>
  $(document).ready(function() {
    // Function to handle Export to Excel
    function exportToExcel() {
      var table = document.getElementById("nilaiTable");
      var rows = table.getElementsByTagName("tr");
      var csvContent = "data:text/csv;charset=utf-8,";
      
      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var rowData = [];
        
        for (var j = 0; j < cells.length; j++) {
          rowData.push(cells[j].innerText);
        }
        
        var row = rowData.join(",");
        csvContent += row + "\r\n";
      }
      
      var encodedUri = encodeURI(csvContent);
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", "data_nilai_mahasiswa.csv");
      document.body.appendChild(link);
      
      link.click();
    }

    // Add Export to Excel button click event
    $("#exportButton").on("click", function() {
      exportToExcel();
    });

    // Add Filter by Kelas functionality
    $("#filterKelas").on("change", function() {
      var kelas = $(this).val();
      if (kelas === "") {
        $("#nilaiTable tbody tr").show();
      } else {
        $("#nilaiTable tbody tr").hide();
        $("#nilaiTable tbody tr:contains('" + kelas + "')").show();
      }
    });
  });
</script> -->
<script>
$(document).ready(function() {
  // Function to handle Export to Excel
  function exportToExcel() {
    window.location.href = "/export-excel";
  }

  // Add Export to Excel button click event
  $("#exportButton").on("click", function() {
    exportToExcel();
  });

  // Add Filter by Kelas functionality
  $("#filterKelas").on("change", function() {
    var kelas = $(this).val();
    if (kelas === "") {
      $("#nilaiTable tbody tr").show();
    } else {
      $("#nilaiTable tbody tr").hide();
      $("#nilaiTable tbody tr:contains('" + kelas + "')").show();
    }
  });
});
</script>


</body>
</html>
@endsection