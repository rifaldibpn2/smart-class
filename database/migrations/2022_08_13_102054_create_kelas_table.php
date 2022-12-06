<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->float('ac_high')->nullable();
            $table->float('ac_medium')->nullable();
            $table->time('active')->nullable();
            $table->boolean('door_lock')->nullable();
            $table->boolean('electricity')->nullable();
            $table->boolean('lamp_1')->nullable();
            $table->boolean('lamp_2')->nullable();
            $table->boolean('lcd')->nullable();
            $table->boolean('pc')->nullable();
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
        Schema::dropIfExists('kelas');
    }
}
