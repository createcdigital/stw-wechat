<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('coupon_id');
            $table->string('coupon_title');
            $table->string('coupon_set_name');
            $table->double('coupon_set_price', 5,2);
            $table->integer('pay_status')->default(0); // 0: 未付款, 1: 已付款
            $table->string('out_trade_no', 32)->default("");
            $table->string('transaction_id', 32)->default("");
            $table->string('qrcode_url', 256)->default("");
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
        Schema::drop('purchase_histories');
    }
}


