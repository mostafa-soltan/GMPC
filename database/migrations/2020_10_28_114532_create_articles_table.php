<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->text('abstract');
            $table->date('publication_date');
            $table->integer('volume');
            $table->integer('issue');
            $table->year('year');
            $table->string('link');
            $table->string('doi');
            $table->integer('status')->default(0);
            $table->integer('start_page');
            $table->integer('end_page');
            $table->string('authors');
            $table->string('keywords');


            //$table->bigInteger('issue_id')->unsigned();
            //$table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');

            //$table->bigInteger('volume_id')->unsigned();
            //$table->foreign('volume_id')->references('id')->on('volumes')->onDelete('cascade');

            $table->bigInteger('journal_id')->unsigned();
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');

            $table->bigInteger('rtopic_id')->unsigned();
            $table->foreign('rtopic_id')->references('id')->on('researchtopics')->onDelete('cascade');

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
        Schema::dropIfExists('articles');
    }
}
