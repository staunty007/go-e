<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->text('phone_number');
            $table->text('customer_address');
            $table->text('bank')->nullable();
            $table->text('district');
            $table->text('meter_no');
            $table->string('bonus_token')->nullable();
            $table->string('token_data')->nullable();
            $table->string('purpose')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payment_ref')->nullable();
            $table->string('user_type');
            $table->string('transaction_type');
            $table->string('value_of_kwh');
            $table->string('payment_status');
            $table->boolean('is_agent')->default(false);
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
        Schema::dropIfExists('payments');
    }
}
