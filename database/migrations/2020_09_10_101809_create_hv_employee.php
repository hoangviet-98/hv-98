<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHvEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hv_employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_name')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_card')->nullable();
            $table->char('emp_phone')->nullable();
            $table->integer('emp_salary')->nullable();
            $table->integer('emp_spa_id')->nullable();
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
        Schema::dropIfExists('hv_employee');
    }
}
