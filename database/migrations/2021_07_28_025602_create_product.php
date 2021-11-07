<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('product_cate');
            $table->integer('product_brand');
            $table->text('product_name');
            $table->text('product_number');
            $table->text('product_desc');
            $table->integer('product_price_original');
            $table->bigInteger('product_price');
            $table->string('product_image');
            $table->string('product_image_list');
            $table->integer('product_status');
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
        Schema::dropIfExists('product');
    }
}
