<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhaps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_nhan_vien')->unsigned()->unique();
            $table->foreign('ma_nhan_vien')->references('id')->on('users');
            $table->dateTime('thoi_gian')->unique();
            $table->bigInteger('ma_nha_cung_cap')->unsigned()->nullable();
            $table->foreign('ma_nha_cung_cap')->references('id')->on('users');
            $table->string('trang_thai');
            $table->double('tong_tien');
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
        Schema::dropIfExists('phieu_nhaps');
    }
}
