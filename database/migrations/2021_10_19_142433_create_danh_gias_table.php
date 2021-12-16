<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->dateTime('thoi_gian')->unique();
            $table->bigInteger('ma_san_pham')->unsigned()->unique();
            $table->foreign('ma_san_pham')->references('id')->on('san_phams');
            $table->bigInteger('ma_tai_khoan')->unsigned()->unique();
            $table->foreign('ma_tai_khoan')->references('id')->on('users');
            $table->string('noi_dung');
            $table->integer('xep_hang')->unsigned();
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
        Schema::dropIfExists('danh_gias');
    }
}
