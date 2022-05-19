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
        Schema::create('unit_r_p_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id');
            $table->unsignedBigInteger('ps_id');
            $table->unsignedBigInteger('w_id');
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('d_id');
            $table->string('rp_name');
            $table->integer('rp_phone');
            $table->integer('rp_nid');
            $table->foreign('p_id')->references('id')->on('parlament_seats');
            $table->foreign('ps_id')->references('id')->on('police_stations');
            $table->foreign('w_id')->references('id')->on('words');
            $table->foreign('u_id')->references('id')->on('units');
            $table->foreign('d_id')->references('id')->on('designation');
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
        Schema::dropIfExists('unit_r_p_s');
    }
};
