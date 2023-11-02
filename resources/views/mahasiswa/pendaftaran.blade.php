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
            <h1 class="m-0">Formulir Pendataan PKL</h1>
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
                      <div class="card-header">{{ __('Formulir Pendataan PKL') }}</div>

                      <div class="card-body">
                      @if (session('success'))
                          <div class="alert alert-success" id="success-alert">
                              {{ session('success') }}
                          </div>
                          
                      @endif                          
                          <form method="POST" action="{{ route('form-pkl') }}" enctype="multipart/form-data">
                            @csrf

                              <div class="form-group">
                                  <label for="jumlah_anggota">Jumlah Anggota Kelompok</label>
                                  <input type="number" class="form-control" name="jumlah_anggota" id="jumlah_anggota" required>
                              </div>

                              <div id="identitas_mahasiswa_container">
                                  <!-- Kolom identitas mahasiswa akan ditambahkan di sini -->
                              </div>

                              <div class="form-group">
                                  <label for="nama_perusahaan_tempat_pkl">Nama Perusahaan Tempat PKL</label>
                                    <select class="form-control" name="nama_perusahaan_tempat_pkl" id="nama_perusahaan_tempat_pkl" required>
                                        <option value="">Pilih Perusahaan</option>
                                        @foreach ($mitras as $mitra)
                                            <option value="{{ $mitra->nama }}" data-kontak="{{ $mitra->no_telp }}" data-idmitra="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                                        @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_mitra" id="id_mitra">
                              </div>


                              <div class="form-group">
                                  <label for="durasi_pkl">Durasi PKL</label>
                                  <input type="text" class="form-control" name="durasi_pkl" id="durasi_pkl" required>
                              </div>

                              <div class="form-group">
                                  <label for="tanggal_mulai_pkl">Tanggal Mulai PKL</label>
                                  <input type="date" class="form-control" name="tanggal_mulai_pkl" id="tanggal_mulai_pkl">
                              </div>

                              <div class="form-group">
                                  <label for="tanggal_selesai_pkl">Tanggal Selesai PKL</label>
                                  <input type="date" class="form-control" name="tanggal_selesai_pkl" id="tanggal_selesai_pkl">
                              </div>

                              <div class="form-group">
                                  <label for="kontak_perusahaan">Kontak Perusahaan</label>
                                  <input type="text" class="form-control" name="kontak_perusahaan" id="kontak_perusahaan">
                              </div>

                              <div class="form-group">
                                  <label for="surat_penerimaan_pkl">Surat Penerimaan PKL</label>
                                  <input type="file" class="form-control-file" name="surat_penerimaan" id="surat_penerimaan" required>
                              </div>

                              <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                          </form>

                          <script>
                              document.getElementById('jumlah_anggota').addEventListener('input', function () {
                                  var jumlahAnggota = parseInt(this.value);
                                  var container = document.getElementById('identitas_mahasiswa_container');

                                  jumlahAnggota = Math.min(jumlahAnggota, 5);


                                  // Menghapus semua kolom identitas mahasiswa sebelumnya
                                  while (container.firstChild) {
                                      container.removeChild(container.firstChild);
                                  }

                                  // Menambahkan kolom identitas mahasiswa sesuai dengan jumlah anggota
                                  for (var i = 1; i <= jumlahAnggota; i++) {
                                      var select = document.createElement('select');
                                      select.className = 'form-control';
                                      select.name = 'identitas_mahasiswa_' + i;

                                      // Mengambil data mahasiswa dari PHP (gunakan sintaks Blade)
                                      @foreach ($mahasiswas as $mahasiswa)
                                          var option = document.createElement('option');
                                          option.value = '{{ $mahasiswa->nama }}'; // Ganti dengan kolom yang sesuai
                                          option.text = '{{ $mahasiswa->nama }} - {{ $mahasiswa->kelas }}'; // Ganti dengan kolom yang sesuai
                                          select.appendChild(option);
                                      @endforeach

                                      var label = document.createElement('label');
                                      label.textContent = 'Identitas Mahasiswa ' + i;

                                      var formGroup = document.createElement('div');
                                      formGroup.className = 'form-group';
                                      formGroup.appendChild(label);
                                      formGroup.appendChild(select);
                                      container.appendChild(formGroup);
                                  }  
                                    // Kode untuk mengatur pilihan Kontak Perusahaan
                                        var namaPerusahaanSelect = document.getElementById('nama_perusahaan_tempat_pkl');
                                        var kontakPerusahaanInput = document.getElementById('kontak_perusahaan');
                                        var idMitraInput = document.getElementById('id_mitra'); // Tambahkan input untuk menyimpan ID mitra

                                        namaPerusahaanSelect.addEventListener('change', function () {
                                            var selectedOption = this.options[this.selectedIndex];
                                            var kontakPerusahaan = selectedOption.getAttribute('data-kontak');
                                            var idMitra = selectedOption.getAttribute('data-idmitra'); // Ambil ID mitra
                                            kontakPerusahaanInput.value = kontakPerusahaan || ''; 
                                            idMitraInput.value = idMitra || ''; // Setel nilai input ID mitra 
                                        });  
                              });
                          </script>

                      </div>
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
<script>
// $(document).ready(function() {
//     $(".edit-btn").click(function() {
//         var id = $(this).data('id');
//         var url = '/mahasiswa/' + id + '/edit'; // Ganti dengan rute edit yang sesuai

//         $("#editForm").attr("action", url);

//         $.get(url, function(data) {
//             $("#editForm input[name=nim]").val(data.nim);
//             $("#editForm input[name=nama]").val(data.nama);
//             $("#editForm input[name=kelas]").val(data.kelas);
//         });
//     });
// });
</script>
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
@endsection
