<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerNameToPostpaidPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postpaid_payments', function (Blueprint $table) {
            $table->string('first_name')->after('payment_type');
            $table->string('last_name')->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postpaid_payments', function (Blueprint $table) {
            $table->dropColumns(['first_name','last_name']);
        });
    }
}
