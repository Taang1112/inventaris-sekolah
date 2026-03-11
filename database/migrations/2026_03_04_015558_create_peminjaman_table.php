<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {

            $table->bigIncrements('peminjaman_id');

            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('barang_id');

            $table->integer('jumlah_pinjam');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();

            $table->enum('status', ['dipinjam','dikembalikan'])->default('dipinjam');

            $table->timestamps();


            // FK guru
            $table->foreign('guru_id')
                ->references('guru_id')
                ->on('guru')
                ->onDelete('cascade');

            // FK kelas
            $table->foreign('kelas_id')
                ->references('kelas_id')
                ->on('kelas')
                ->onDelete('cascade');

            // FK barang
            $table->foreign('barang_id')
                ->references('barang_id')
                ->on('barang')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}