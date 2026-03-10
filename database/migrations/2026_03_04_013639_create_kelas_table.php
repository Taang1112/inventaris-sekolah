  <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
    $table->bigIncrements('kelas_id');
    $table->string('nama_kelas', 50);  
    $table->unsignedBigInteger('guru_id');
    $table->timestamps();

    $table->foreign('guru_id') ->references('guru_id')->on('guru')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
