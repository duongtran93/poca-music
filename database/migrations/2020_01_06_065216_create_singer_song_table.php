<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingerSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singer_song', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('singer_id')->nullable();
            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade');
            $table->unsignedBigInteger('song_id')->nullable();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
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
        Schema::dropIfExists('singer_song');
    }
}
