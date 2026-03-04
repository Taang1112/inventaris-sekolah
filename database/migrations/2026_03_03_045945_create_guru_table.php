<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
    $table->bigIncrements('guru_id');
    $table->string('nama_guru', 100);
    $table->string('nip', 30)->unique();
    $table->string('no_hp', 20)->nullable();
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('guru');
    }
}