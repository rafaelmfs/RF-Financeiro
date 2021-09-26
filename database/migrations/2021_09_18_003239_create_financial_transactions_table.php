<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('type-movement');
            $table->unsignedBigInteger('financial-account');
            $table->unsignedBigInteger('category');
            $table->double('value');
            $table->date('date');
            $table->timestamps();
            $table->string('Descricao');
            $table->boolean('state');

            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('type-movement')->references('id')->on('type_movements')->onDelete('RESTRICT');
            $table->foreign('financial-account')->references('id')->on('financial_accounts')->onDelete('RESTRICT');
            $table->foreign('category')->references('id')->on('categories')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_transactions');
    }
}
