<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("station_id");
            $table->foreign("station_id")->references("id")->on("stations");
            $table->float("niveau_cuve");
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
        Schema::dropIfExists('cuves');
    }
}
