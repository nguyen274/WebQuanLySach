<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            //$table->id();
            $table->increments('idBook');
            $table->string('nameBook',50);
            $table->integer('amount');
            $table->unsignedInteger('idSubject');
            $table->foreign('idSubject')->references('idSubject')->on('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');

    }
}
