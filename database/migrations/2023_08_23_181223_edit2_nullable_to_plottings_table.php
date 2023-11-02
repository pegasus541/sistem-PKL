<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Edit2NullableToPlottingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->string ('perusahaan')->nullable()->change();
            $table->string ('dosen_pembimbing')->nullable()->change();
            $table->string ('id_pendaftaran')->nullable()->change();
            $table->string ('id_dosen')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plottings', function (Blueprint $table) {
            //
        });
    }
}
