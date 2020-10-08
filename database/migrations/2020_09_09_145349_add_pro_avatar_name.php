<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProAvatarName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hv_product', function (Blueprint $table) {
            $table->string('pro_avatarName');
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
            $table->dropColumn('pro_avatarName');
        });
    }
}
