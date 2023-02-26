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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->default(0)->unsigned();
            $table->bigInteger('spice_id')->default(0)->unsigned();

            //$table->bigInteger('category_id')->default(0);
            $table->string('title', 100)->nullable();
            $table->text('description', 1000)->nullable();
            $table->float('price')->unsigned()->nullable();
            $table->integer('stock')->unsigned()->nullable();
            $table->string('status')->default('unavailable');

            $table->timestamps();
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->index('spice_id');
            $table->foreign('spice_id')->references('id')->on('spices');
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
};
