<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hv_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('or_transaction_id')->default(0);
            $table->integer('or_product_id')->default(0);
            $table->tinyInteger('or_quantity')->default(0);
            $table->integer('or_price')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
