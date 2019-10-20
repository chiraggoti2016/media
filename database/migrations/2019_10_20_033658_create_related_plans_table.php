<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); 
            $table->string('price'); 
            $table->string('discount'); 
            $table->string('free_rental'); 
            $table->string('note');
            $table->string('options');
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
        Schema::dropIfExists('related_plans');
    }
}
