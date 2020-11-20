<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_keywords', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pk_product_id')->unsigned();  
            $table->bigInteger('pk_keyword_id')->unsigned();
            $table->foreign('pk_product_id')->references('id')->on('products');
            $table->foreign('pk_keyword_id')->references('id')->on('keywords');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_keywords');
    }
}
