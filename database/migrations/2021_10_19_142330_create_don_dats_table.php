<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonDatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_dats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_khach_hang')->unsigned();
            $table->foreign('ma_khach_hang')->references('id')->on('users');
            $table->dateTime('thoi_gian');
            $table->bigInteger('ma_nhan_vien')->unsigned()->nullable();
            $table->foreign('ma_nhan_vien')->references('id')->on('users');
            $table->string('trang_thai');
            $table->double('tong_tien');
            $table->unique(['ma_khach_hang', 'thoi_gian']);
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
        Schema::dropIfExists('don_dats');
    }
}
