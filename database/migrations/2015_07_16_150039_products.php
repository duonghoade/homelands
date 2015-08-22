<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('summary');
            $table->string('price');
            $table->string('unit');
            $table->string('code');
            $table->string('thick');
            $table->string('guarantee');
            $table->integer('sub_category_id')->unsigned()->default(0);
            $table->foreign("sub_category_id")->references("id")->on("subcategories")->onDelete("cascade");
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
