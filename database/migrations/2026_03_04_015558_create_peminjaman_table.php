<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->foreignId('barang_id')->constrained('barang', 'barang_id')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('guru', 'guru_id')->onDelete('cascade');
            $table->integer('jumlah_pinjam');
            $table->date('tanggal_pinjam');
            $table->enum('status', ['dipinjam', 'kembali'])->default('dipinjam');
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
        Schema::dropIfExists('peminjaman');
    }
}
