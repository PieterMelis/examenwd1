<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordTable extends Migration
{
    public function up()
    {
        Schema::create('word', function (Blueprint $table) {
            $table->increments('id');
            $table->string('word', 255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('word');
    }
}
