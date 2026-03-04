<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
    $table->bigIncrements('barang_id');
    $table->string('kode_barang', 50)->unique();
    $table->string('nama_barang', 100);
    $table->integer('jumlah_total');
    $table->integer('jumlah_tersedia');
    $table->enum('kondisi', ['baik', 'rusak'])->default('baik');
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
        Schema::dropIfExists('barang');
    }
}
