<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('account_id')->unsigned();
            $table->integer('finance_group_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->double('amount');
            $table->timestamp('date_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts');
            //$table->foreign('group_id')->references('id')->on('groups_of_transactions');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_id');
        Schema::dropIfExists('finance_group_id');
        Schema::dropIfExists('transactions');
    }
}
