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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_user_id');
            $table->integer('order_total_money')->default(0);
            $table->integer('order_shipping_fee')->nullable()->default(0);
            $table->string('order_name')->nullable();
            $table->string('order_email')->nullable();
            $table->string('order_phone')->nullable();
            $table->string('order_address')->nullable();
            $table->string('order_note')->nullable();
            $table->tinyInteger('order_payment')->nullable()->default(1);          
            $table->tinyInteger('order_status')->nullable()->default(1);
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
