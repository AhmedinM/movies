<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeCaptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_captions', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('title');
            $table->string('short');
            $table->unsignedBigInteger('episode_id');
            $table->foreign('episode_id')->references('id')->on('episodes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('episode_captions');
    }
}
