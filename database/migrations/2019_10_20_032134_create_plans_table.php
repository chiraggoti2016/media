<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('time_period')->comment('Unlimited/Limited'); 
            $table->string('price');
            $table->string('discount'); 
            $table->string('free_months'); 
            $table->string('offer'); 
            $table->string('up_speed'); 
            $table->string('down_speed'); 
            $table->string('desctiption'); 
            $table->string('short_description'); 
            $table->string('detail_desctiption'); 
            $table->bigInteger('plan_type_id')->unsigned();
            $table->foreign('plan_type_id')->references('id')->on('plan_types')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('plans');
    }
}
