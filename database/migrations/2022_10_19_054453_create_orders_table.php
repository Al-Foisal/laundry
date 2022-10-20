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
            $table->unsignedBigInteger('user_id');
            $table->string('user_payment_method');
            $table->string('user_payment_number')->nullable();
            $table->tinyInteger('user_payment_status');

            $table->string('coupon_code')->nullable();
            $table->string('coupon_percentage')->nullable();

            $table->unsignedInteger('total');
            $table->unsignedInteger('discount')->default(0);
            $table->unsignedInteger('shipping_charge')->default(0);
            $table->unsignedInteger('paid_amount');

            $table->unsignedBigInteger('partner_id')->nullable();
            $table->unsignedInteger('partner_amount')->default(0);
            $table->tinyInteger('partner_payment_status')->default(0);

            $table->unsignedBigInteger('deliveryman_id')->nullable();
            $table->unsignedInteger('deliveryman_amount')->default(0);
            $table->tinyInteger('deliveryman_payment_status')->default(0);
            $table->unsignedInteger('deliveryman_due')->default(0);
            $table->tinyInteger('deliveryman_due_status')->default(0);


            $table->unsignedInteger('status');

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
