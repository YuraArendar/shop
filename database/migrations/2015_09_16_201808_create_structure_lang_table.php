<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructureLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_lang', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('structure_id')->unsigned();
            $table->foreign('structure_id')->references('id')->on('structure')->onDelete('cascade');
            $table->string('language_id',2);
            $table->string('name');
            $table->text('description');
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
        Schema::drop('structure_lang');
    }
}
