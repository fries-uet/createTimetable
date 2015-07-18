<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopmhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lopmh', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sub_id');
            $table->string('danhSach', 40);
            $table->string('maLMH', 40);

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
        Schema::drop('lopmh');
    }
}
