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
        Schema::create('coupons', function (Blueprint $table) {
            $table->string('coupon_code',20);
            $table->string('name_coupon',30);
            $table->string('type_coupon',30);
            $table->integer('amount');
            $table->tinyInteger('stub_coupon');
            $table->integer('get_condition');
            $table->dateTime('start_coupon');
            $table->dateTime('end_coupon');
            $table->softDeletes();
            $table->primary('coupon_code');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
