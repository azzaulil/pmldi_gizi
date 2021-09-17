<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('foto_pre');
            $table->string('foto_post');
            $table->enum('status', ['proses', 'selesai']);
            $table->integer('presentase')->nullable();
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_makanan')->constrained('makanans');
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
        Schema::dropIfExists('laporans');
    }
}
