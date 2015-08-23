<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatar');
            $table->string('title');
            $table->text('summary');
            $table->text('content');
            $table->string('meta_description');
            $table->string('meta_keyworks');
            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
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
        Schema::drop('products');
    }
}
