<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnProRatingInTableHvProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hv_product', function (Blueprint $table) {
            $table->integer('pro_total_rating')->default(0)->comment('Total review');
            $table->integer('pro_total_number')->default(0)->comment('Total point review');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hv_product', function (Blueprint $table) {
            $table->dropColumn('pro_total_rating');
            $table->dropColumn('pro_total_number');
        });
    }
}
