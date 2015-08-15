<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input', function (Blueprint $table) {
            $table->increments('id');

            $table->char('maMH', 40);
            $table->char('monhoc', 200);
            $table->integer('soTin');
            $table->char('maLMH', 40);
            $table->char('giangVien');
            $table->integer('soSV');
            $table->integer('thu');
            $table->char('tiet', 10);
            $table->char('giangDuong', 40);
            $table->char('ghiChu', 10);

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
        Schema::drop('input');
    }
}