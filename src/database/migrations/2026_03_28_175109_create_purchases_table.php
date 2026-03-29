<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('product_id');
        $table->string('postcode');
        $table->string('address');
        $table->string('building')->nullable();
        $table->unsignedBigInteger('pay_id');
        $table->timestamps();

        // $table->foreign('user_id')->references('id')->on('users');
        // $table->foreign('product_id')->references('id')->on('products');
        // $table->foreign('pay_id')->references('id')->on('pays');
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
