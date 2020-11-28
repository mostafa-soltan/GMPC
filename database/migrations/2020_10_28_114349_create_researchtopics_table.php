<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchtopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchtopics', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->text('overview');
            $table->string('editor1')->nullable();
            $table->string('affiliation1')->nullable();
            $table->string('editor2')->nullable();
            $table->string('affiliation2')->nullable();
            $table->string('editor3')->nullable();
            $table->string('affiliation3')->nullable();
            $table->string('editor4')->nullable();
            $table->string('affiliation4')->nullable();
            $table->string('keywords')->nullable();

            $table->bigInteger('journal_id')->unsigned();
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');

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
        Schema::dropIfExists('researchtopics');
    }
}
