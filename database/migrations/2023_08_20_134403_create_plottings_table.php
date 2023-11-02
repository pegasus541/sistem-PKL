<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlottingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plottings', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_1');
            $table->string('mahasiswa_2')->nullable();
            $table->string('mahasiswa_3')->nullable();
            $table->string('mahasiswa_4')->nullable();
            $table->string('mahasiswa_5')->nullable();
            $table->string('perusahaan');
            $table->string('dosen_pembimbing');
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
        Schema::dropIfExists('plottings');
    }
}
