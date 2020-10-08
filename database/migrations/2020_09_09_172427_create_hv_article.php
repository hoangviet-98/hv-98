<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHvArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hv_article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('a_name')->nullable()->unique();
            $table->string('a_slug')->index();
            $table->string('a_description')->nullable();
            $table->string('a_content')->nullable();
            $table->string('a_description_seo')->nullable();
            $table->string('a_title_seo')->nullable();
            $table->string('a_avatar')->nullable();
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
        Schema::dropIfExists('hv_article');
    }
}
