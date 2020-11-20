<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('pro_price')->default(0);
            $table->integer('pro_price_entry')->nullable()->default(0)->comment('giá nhập');
            $table->integer('pro_sale')->nullable()->default(0);
            $table->string('pro_avatar')->nullable();
            $table->text('pro_avatar_list')->nullable();
            $table->integer('pro_view')->default(0);
            $table->tinyInteger('pro_hot')->default(0);
            $table->tinyInteger('pro_active')->default(1);
            $table->integer('pro_pay')->default(0);
            $table->mediumText('pro_description')->nullable();
            $table->text('pro_content')->nullable();
            $table->integer('pro_number')->nullable();
            $table->integer('pro_review_total')->default(0);
            $table->integer('pro_review_star')->default(0);
            $table->bigInteger('pro_category_id')->unsigned();
            $table->bigInteger('pro_brand_id')->unsigned();
            $table->foreign('pro_category_id')->references('id')->on('categories');
            $table->foreign('pro_brand_id')->references('id')->on('brands');

            
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
        Schema::dropIfExists('products');
    }
}
