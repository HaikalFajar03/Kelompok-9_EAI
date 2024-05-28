<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            //SATU
            $table->string('namalengkap');
            $table->string('TTL');//nanti ganti biar tempat dan tgl lahir pisah
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->enum('agama', ['Islam', 'Kristen','Katolik','Hindu', 'Buddha', 'Khonghucu']);
            $table->string('alamat');
            $table->bigInteger('phonenumber')->nullable();
            $table->string('email', 128)->nullable();
            $table->bigInteger('No_ktp')->nullable();



            //DUA
            $table->enum('pendidikan', ['Tidak ada', 'SD atau setara','SMP atau setara','SMA atau setara', 'D3 atau setara', 'Pendidikan tinggi atau setara']);
            $table->string('institusi')->nullable();;
            $table->string('jurusan')->nullable();;
            $table->integer('tahunmasuk')->nullable();;
            $table->integer('tahunlulus')->nullable();;

            //TIGA
            $table->string('pengalaman')->nullable();;
            $table->string('bidang')->nullable();;
            $table->integer('tahun')->nullable();; //pisah dong //tambah ceklist beker atau tidak
            $table->string('posisi')->nullable();;

            $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
