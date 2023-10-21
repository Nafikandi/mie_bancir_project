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
        Schema::create('menus', function (Blueprint $table) {
            $table->string('kd_menu',12);
            $table->string('photo', 100);
            $table->string('name_menu',30);
            $table->bigInteger('category_menu')->unsigned();
            $table->enum('status_menu', ['tersedia', 'habis']);
            $table->integer('price_menu');
            $table->longText('description_menu');
            $table->softDeletes();
            $table->timestamps();
            $table->primary('kd_menu');
            $table->foreign('category_menu')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
