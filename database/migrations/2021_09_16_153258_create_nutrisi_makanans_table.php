<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutrisiMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrisi_makanans', function (Blueprint $table) {
            $table->id();
            $table->double('nilai_nutrisi', 8, 2);
            $table->foreignId('id_makanan')->constrained('makanans');
            $table->foreignId('id_nutrisi')->constrained('nutrisis');
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
        Schema::dropIfExists('nutrisi_makanans');
    }
}
