<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('pengembalian_id');
            $table->foreignId('peminjaman_id')->constrained('peminjaman', 'peminjaman_id')->onDelete('cascade');
            $table->date('tanggal_kembali');
            $table->enum('kondisi_kembali', ['baik', 'rusak']);
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
        Schema::dropIfExists('pengembalian');
    }
}
