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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->integer('P_id');
            $table->integer('PS_id');
            $table->string('w_number');
            $table->foreign('P_id')->references('id')->on('parlament_seats')->onDelete('cascade');
            $table->foreign('PS_id')->references('id')->on('police_stations')->onDelete('cascade');
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
        //
    }
};
