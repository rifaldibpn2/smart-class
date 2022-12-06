<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_object', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->float('ac_high')->nullable();
            $table->float('ac_medium')->nullable();
            $table->time('active')->nullable();
            $table->boolean('door_lock')->nullable();
            $table->boolean('electricity')->nullable();
            $table->boolean('lamp_1')->nullable();
            $table->boolean('lamp_2')->nullable();
            $table->boolean('lcd')->nullable();
            $table->boolean('pc')->nullable();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_object');
    }
};
