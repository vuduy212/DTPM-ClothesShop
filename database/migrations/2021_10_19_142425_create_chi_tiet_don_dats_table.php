<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietDonDatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_don_dats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_san_pham')->unsigned();
            $table->foreign('ma_san_pham')->references('id')->on('san_phams');
            $table->bigInteger('ma_don_dat')->unsigned();
            $table->foreign('ma_don_dat')->references('id')->on('don_dats');
            $table->integer('so_luong')->unsigned();
            $table->unique(['ma_san_pham', 'ma_don_dat']);
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
        Schema::dropIfExists('chi_tiet_don_dats');
    }
}
