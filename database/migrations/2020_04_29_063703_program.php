<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Program extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_panti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_panti');
            $table->foreign('id_panti')->references('id')->on('panti');
            $table->mediumText('photo_program')->nullable($value = true);
            $table->text('deskripsi_program');
            $table->bigInteger('biaya');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_panti');
    }
}
