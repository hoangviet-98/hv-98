<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHvMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hv_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mu_name');
            $table->string('mu_slug')->unique();
            $table->string('mu_avatar')->nullable();
            $table->string('mu_description')->nullable();
            $table->tinyInteger('mu_status')->default(1);
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
        Schema::dropIfExists('hv_menu');
    }
}
