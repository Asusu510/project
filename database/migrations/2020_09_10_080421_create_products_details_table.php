<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prod_product_id')->unsigned();
            $table->bigInteger('prod_color_id')->nullable()->unsigned();
            $table->bigInteger('prod_size_id')->nullable()->unsigned();

            $table->foreign('prod_product_id')->references('id')->on('products');
            $table->foreign('prod_color_id')->references('id')->on('colors');
            $table->foreign('prod_size_id')->references('id')->on('sizes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_details');
    }
}
