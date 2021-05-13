<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('contentID');
            $table->string('name');
            $table->string('author');
            $table->string('producer');
            $table->string('genre');
            $table->string('durTime');
            $table->string('poster');
            $table->string('numberOfRented');
            $table->string('contentType');
            $table->string('trailerLink');  
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
        Schema::dropIfExists('content');
    }
}
