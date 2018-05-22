<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostpaidPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postpaid_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->enum("payment_type", ['Postpaid','Penalties','Loss of Revenue','Reconnection Fee'])->default("Postpaid");
            $table->text('phone_number');
            $table->string('email');
            $table->text('meter_no');
            $table->integer('amount');
            $table->integer('conv_fee');
            $table->integer('total_amount');
            $table->text('transaction_ref');
            $table->integer('is_agent')->default(0);
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
        Schema::dropIfExists('postpaid_payments');
    }
}
