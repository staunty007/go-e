<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_topups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trans_ref');
            $table->string('agent_id');
            $table->string('agent_name');
            $table->string('topup_amount');
            $table->string('wallet_balance');
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
        Schema::dropIfExists('agent_topups');
    }
}
