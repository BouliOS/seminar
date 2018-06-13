<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmoviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmovi', function (Blueprint $table) {
            $table->increments('film_id');
            $table->text('film_naslov');
            $table->text('film_zanr');
            $table->text('film_godina');
            $table->text('film_trajanje');
            $table->text('film_slika');
            $table->datetime('created_on')->nullable();
            $table->datetime('modified_on')->nullable();
            $table->text('deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmovi');
    }
}
