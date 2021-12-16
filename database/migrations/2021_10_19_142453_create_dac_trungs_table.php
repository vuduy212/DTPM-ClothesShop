<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDacTrungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dac_trungs', function (Blueprint $table) {
            $table->id();
            $table->string('loai_dac_trung')->unique();
            $table->integer('so_thu_tu')->unsigned()->unique();
            $table->string('ten_dac_trung');
            $table->string('gia_tri');
            $table->string('mo_ta')->nullable();
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
        Schema::dropIfExists('dac_trungs');
    }
}
