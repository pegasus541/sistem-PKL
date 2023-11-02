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
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form Nilai UTS Mahasiswa</div>
                    <div class="card-body">  
                        <form method="POST" action="{{ route ('form-nilaiutsdosen') }}">
                            @csrf


                            <!-- Data Mahasiswa -->
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>                                
                                <select class="form-control" name="nama" id="nama_uts_1" required>
                                        <option value="">Pilih Mahasiswa</option>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <option value="{{ $mahasiswa->nama }}" data-nim="{{ $mahasiswa->nim }}" data-kelas="{{ $mahasiswa->kelas }}">{{ $mahasiswa->nama }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nim">NIM Mahasiswa</label>
                                <input type="text" class="form-control" name="nim" id="nim_uts_1" required>
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas_uts_1" required>
                            </div>

                            <div class="form-group">
                                <label for="nilai_uts_dosen">Nilai UTS</label>
                                <input type="number" class="form-control" name="nilai_uts_dosen" id="nilai_uts_dosen" required>
                            </div>

                            <div class="form-group">
                                <label for="mitra">Tempat PKL</label>                                
                                <select class="form-control" name="mitra" id="mitra" required>
                                        <option value="">Pilih Mitra Tempat PKL</option>
                                        @foreach ($mitras as $mitra)
                                            <option value="{{ $mitra->nama }}">{{ $mitra->nama }}</option>
                                        @endforeach
                                </select>
                            </div>
                                                           
                                <input type="hidden" class="form-control" name="pembimbing" id="pembimbing_uts_1" required>
                            
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>

                        </form>

                        <script>
                                    // Kode untuk mengisi inputan pembimbing dari nama pengguna saat ini
                                    var pembimbingInput1 = document.getElementById('pembimbing_uts_1');

                                    // Mendapatkan nama pengguna dari objek "auth" di halaman Blade
                                    var namaPengguna1 = "{{ auth()->user()->name }}";

                                    // Mengisi nilai inputan "pembimbing" dengan nama pengguna saat ini
                                    pembimbingInput1.value = namaPengguna1;
                                    // Kode untuk mengatur pilihan Kontak Perusahaan
                                        var namaMahasiswaSelect1 = document.getElementById('nama_uts_1');
                                        var nimMahasiswaInput1 = document.getElementById('nim_uts_1');
                                        var kelasMahasiwaInput1 = document.getElementById('kelas_uts_1'); // Tambahkan input untuk menyimpan ID mitra

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form Nilai UAS Mahasiswa</div>
                    <div class="card-body">  
                        <form method="POST" action="{{ route ('form-nilaiuasdosen') }}">
                            @csrf

                            <!-- Data Mahasiswa -->
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>                                
                                <select class="form-control" name="nama" id="nama_uas_2" required>
                                        <option value="">Pilih Mahasiswa</option>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <option value="{{ $mahasiswa->nama }}" data-nim="{{ $mahasiswa->nim }}" data-kelas="{{ $mahasiswa->kelas }}">{{ $mahasiswa->nama }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nim">NIM Mahasiswa</label>
                                <input type="text" class="form-control" name="nim" id="nim_uas_2" required>
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas_uas_2" required>
                            </div>

                            <div class="form-group">
                                <label for="nilai_uas_dosen">Nilai UTS</label>
                                <input type="number" class="form-control" name="nilai_uas_dosen" id="nilai_uas_dosen" required>
                            </div>

                            <div class="form-group">
                                <label for="mitra">Tempat PKL</label>                                
                                <select class="form-control" name="mitra" id="mitra" required>
                                        <option value="">Pilih Mitra Tempat PKL</option>
                                        @foreach ($mitras as $mitra)
                                            <option value="{{ $mitra->nama }}">{{ $mitra->nama }}</option>
                                        @endforeach
                                </select>
                            </div>
                                                           
                                <input type="hidden" class="form-control" name="pembimbing" id="pembimbing_uas_2" required>
                            
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                        <script>
                                    // Kode untuk mengisi inputan pembimbing dari nama pengguna saat ini
                                    var pembimbingInput2 = document.getElementById('pembimbing_uas_2');

                                    // Mendapatkan nama pengguna dari objek "auth" di halaman Blade
                                    var namaPengguna2 = "{{ auth()->user()->name }}";

                                    // Mengisi nilai inputan "pembimbing" dengan nama pengguna saat ini
                                    pembimbingInput2.value = namaPengguna2;
                                    // Kode untuk mengatur pilihan Kontak Perusahaan
                                        var namaMahasiswaSelect2 = document.getElementById('nama_uas_2');
                                        var nimMahasiswaInput2 = document.getElementById('nim_uas_2');
                                        var kelasMahasiwaInput2 = document.getElementById('kelas_uas_2'); // Tambahkan input untuk menyimpan ID mitra

                                        namaMahasiswaSelect2.addEventListener('change', function () {
                                            var selectedOption = this.options[this.selectedIndex];
                                            var nimMahasiswa = selectedOption.getAttribute('data-nim');
                                            var kelasMahasiwa = selectedOption.getAttribute('data-kelas'); // Ambil ID mitra
                                            nimMahasiswaInput2.value = nimMahasiswa || '';
                                            kelasMahasiwaInput2.value = kelasMahasiwa || '';
                                           
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