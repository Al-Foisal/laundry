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
        Schema::create('order_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('deliveryman_id')->nullable();
            $table->unsignedInteger('partner_id')->nullable();
            $table->unsignedInteger('order_status_id')->default(1);
            $table->unsignedInteger('is_deliveryman_seen')->default(0);
            $table->unsignedInteger('is_partner_seen')->default(0);
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('area_id');
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
        Schema::dropIfExists('order_notifications');
    }
};
