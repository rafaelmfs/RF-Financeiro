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
            $table->string('name', 80);
            $table->unsignedBigInteger('type_movement');
            $table->unsignedBigInteger('financial_account');
            $table->unsignedBigInteger('category');
            $table->double('value');
            $table->date('date')->nullable();
            $table->timestamps();
            $table->text('description');
            $table->string('state', 20);

            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('type_movement')->references('id')->on('type_movements')->onDelete('RESTRICT');
            $table->foreign('financial_account')->references('id')->on('financial_accounts')->onDelete('RESTRICT');
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
