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
            $table->string('code_order',15);
            $table->string('kd_menu');
            $table->bigInteger('user')->unsigned();
            $table->dateTime('order_date');
            $table->integer('quantity');
            $table->string('desctipted',100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary('code_order');
            $table->foreign('kd_menu')->references('kd_menu')->on('menus')->onDelete('cascade');
            $table->foreign('user')->references('user_id')->on('users')->onDelete('cascade');

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
