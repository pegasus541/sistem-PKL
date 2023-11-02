<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_dosen', function (Blueprint $table) {
             
                $table->increments('id'); // Kolom nomor yang auto increment
                $table->string('nama');
                $table->string('nim');
                $table->string('tempat_pkl');
                $table->string('judul_laporan_pkl');
                $table->integer('kesopanan');
                $table->integer('kedisiplinan');
                $table->integer('kejujuran');
                $table->integer('kerjasama');
                $table->integer('kepemimpinan');
                $table->integer('tanggapan_saran');
                $table->integer('kreativitas');
                $table->integer('daya_nalar');
                $table->integer('penguasaan_materi');
                $table->integer('kajian_literatur_alat');
                $table->integer('pembuatan_hardware');
                $table->integer('pembuatan_software');
                $table->integer('instalasi_hardware');
                $table->integer('instalasi_software');
                $table->integer('tata_tulis_bahasa');
                $table->integer('kesesuaian_perencanaan');
                $table->integer('analisa_data_hasil_karya');
                $table->integer('kesimpulan');
                $table->integer('kelengkapan_lampiran');



                // Tambahkan kolom-kolom lainnya sesuai kebutuhan

                $table->timestamps(); // Tambahkan kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_dosen');
    }
}
