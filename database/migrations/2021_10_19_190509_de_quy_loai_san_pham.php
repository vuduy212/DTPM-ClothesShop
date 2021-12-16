<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeQuyLoaiSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loai_san_phams', function (Blueprint $table) {
            $table->bigInteger('ma_loai_san_pham_cha')->unsigned()->nullable();
            $table->foreign('ma_loai_san_pham_cha')->references('id')->on('loai_san_phams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loai_san_phams', function (Blueprint $table) {
            //
        });
    }
}
