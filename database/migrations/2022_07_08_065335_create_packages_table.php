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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('mm');
            $table->string('url');
            $table->string('domain');
            $table->string('ssl');
            $table->string('hosting');
            $table->string('respondsive');
            $table->string('language');
            $table->string('quota');
            $table->string('menu');
            $table->string('artwork');
            $table->string('content');
            $table->string('img');
            $table->string('tracking');
            $table->string('ecommerce');
            $table->string('product');
            $table->integer('day');
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
        Schema::dropIfExists('packages');
    }
};
