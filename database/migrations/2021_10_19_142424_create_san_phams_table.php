<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_thuong_hieu')->unsigned()->nullable();
            $table->foreign('ma_thuong_hieu')->references('id')->on('thuong_hieus');
            $table->bigInteger('ma_loai_san_pham')->unsigned()->nullable();
            $table->foreign('ma_loai_san_pham')->references('id')->on('loai_san_phams');
            $table->string('ten');
            $table->string('hinh_anh')->nullable();
            $table->string('don_vi')->nullable();
            $table->double('don_gia_nhap')->nullable();
            $table->double('don_gia_ban')->nullable();
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
        Schema::dropIfExists('san_phams');
    }
}
