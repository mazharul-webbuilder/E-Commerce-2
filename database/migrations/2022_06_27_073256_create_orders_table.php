<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('customerId');
            $table->integer('order_total');
            $table->integer('tax_amount');
            $table->integer('shipping_cost');
            $table->text('delivery_address');
            $table->string('order_status')->default('Pending');
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->string('payment-status')->default('Pending');
            $table->string('payment_type');
            $table->integer('payment_amount')->default(0);
            $table->text('payment-date')->nullable();
            $table->text('payment-timestamp')->nullable();
            $table->text('delivery_date')->nullable();
            $table->text('delivery_timestamp')->nullable();
            $table->text('transactionID')->nullable();
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
};
