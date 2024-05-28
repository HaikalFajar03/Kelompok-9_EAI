<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestUjiKemampuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_uji_kemampuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_test');
            $table->date('tanggal_pelaksanaan');
            $table->string('tempat_pelaksanaan');
            $table->text('anggota_test');
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
        Schema::dropIfExists('test_uji_kemampuan');
    }
}
