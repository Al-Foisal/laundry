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
        Schema::create('deliverymen', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('commission')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('e_phone');
            $table->string('phone');
            $table->string('address');
            $table->string('image');
            $table->string('nid');
            $table->string('e_nid')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('deliverymen');
    }
};
