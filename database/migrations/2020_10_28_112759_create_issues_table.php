<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('issue_no');

            //$table->bigInteger('volume_id')->unsigned();
            //$table->foreign('volume_id')->references('id')->on('volumes')->onDelete('cascade');

            //$table->bigInteger('journal_id')->unsigned();
            //$table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');

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
        Schema::dropIfExists('issues');
    }
}
