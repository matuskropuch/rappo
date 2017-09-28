<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('rapper_id')->unsigned();
            $table->date('released_at');
            $table->text('image');
            $table->text('info');
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('rapper_id')->references('id')->on('rappers');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
