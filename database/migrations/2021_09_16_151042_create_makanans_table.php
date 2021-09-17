<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->string('harga');
            $table->double('porsi', 8, 2);
            $table->enum('label', ['sangat baik','baik','buruk'])->nullable();
            $table->string('foto_makanan');
            $table->foreignId('id_kantin')->constrained('kantins');
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
        Schema::dropIfExists('makanans');
    }
}
