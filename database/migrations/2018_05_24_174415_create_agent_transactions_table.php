<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_id');
            $table->integer('initial_amount');
            $table->integer('conv_fee');
            $table->integer('total_amount');
            $table->integer('commission');
            $table->float('pgp',100,2);
            $table->float('agent',100,2);
            $table->float('bal',100,2);
            $table->float('spec',100,2);
            $table->float('ralmuof',100,2);
            $table->float('total_split',100,2);
            $table->float('net_amount',100,2);
            $table->float('wallet_bal',100,2);
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
        Schema::dropIfExists('agent_transactions');
    }
}
