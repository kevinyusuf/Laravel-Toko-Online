<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertForeignKeyToDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detailTransactions', function (Blueprint $table) {
            $table->foreign('transactionId')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detailTransactions', function (Blueprint $table) {
            //
        });
    }
}
