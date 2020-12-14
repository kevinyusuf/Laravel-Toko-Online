<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            // $table->unsignedBigInteger('transactionId');
            $table->unsignedBigInteger('productId');
            $table->integer('productQTY');
            // $table->string('status');
            $table->timestamps();
            // $table->foreign('transactionId')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('productId')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
