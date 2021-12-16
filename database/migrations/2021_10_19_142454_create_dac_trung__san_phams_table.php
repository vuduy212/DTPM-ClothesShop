<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDacTrungSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dac_trung__san_phams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_san_pham')->unsigned()->unique();
            $table->foreign('ma_san_pham')->references('id')->on('san_phams');
            $table->bigInteger('ma_dac_trung')->unsigned()->unique();
            $table->foreign('ma_dac_trung')->references('id')->on('dac_trungs');
            $table->integer('so_luong')->unsigned();
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
        Schema::dropIfExists('dac_trung__san_phams');
    }
}
