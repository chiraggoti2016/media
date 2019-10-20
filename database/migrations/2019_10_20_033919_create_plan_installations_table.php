<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_installations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('plan_id');
            $table->string('plan_install_fee');
            $table->string('setup_type');
            $table->string('install_date1');
            $table->string('install_date2');
            $table->string('install_date3');
            $table->string('installation_addr');
            $table->string('instation_preferences');
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
        Schema::dropIfExists('plan_installations');
    }
}
