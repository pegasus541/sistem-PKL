<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranPklTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_pkls', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_anggota');
            $table->string('identitas_mahasiswa_1');
            $table->string('identitas_mahasiswa_2')->nullable();
            $table->string('identitas_mahasiswa_3')->nullable();
            $table->string('identitas_mahasiswa_4')->nullable();
            $table->string('identitas_mahasiswa_5')->nullable();
            $table->string('nama_perusahaan_tempat_pkl');
            $table->string('durasi_pkl');
            $table->date('tanggal_mulai_pkl');
            $table->date('tanggal_selesai_pkl');
            $table->string('kontak_perusahaan');
            $table->string('surat_penerimaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_pkl');
    }
}
