<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuoihocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buoihoc', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('nhom');
            $table->integer('viTri');
            $table->integer('soTiet');
            $table->string('giangDuong', 40);
            $table->string('giaoVien', 40);

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
        Schema::drop('buoihoc');
    }
}
