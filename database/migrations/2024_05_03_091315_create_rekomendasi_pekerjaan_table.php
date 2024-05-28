<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasiPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekomendasi_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penduduk');
            $table->string('hasil_test_uji');
            $table->string('nama_pekerjaan');
            $table->string('lokasi_pekerjaan');
            $table->text('deskripsi_pekerjaan');
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
        Schema::dropIfExists('rekomendasi_pekerjaan');
    }
}
