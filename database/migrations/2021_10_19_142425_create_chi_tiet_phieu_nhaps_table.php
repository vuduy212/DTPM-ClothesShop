<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietPhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_phieu_nhaps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_san_pham')->unsigned()->unique();
            $table->foreign('ma_san_pham')->references('id')->on('san_phams');
            $table->bigInteger('ma_phieu_nhap')->unsigned()->unique();
            $table->foreign('ma_phieu_nhap')->references('id')->on('phieu_nhaps');
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
        Schema::dropIfExists('chi_tiet_phieu_nhaps');
    }
}
