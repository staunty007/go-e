<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('agent_id');
            $table->bigInteger('wallet_balance')->default(0);
            $table->bigInteger('profit')->default(0);
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('agent_biodatas');
    }
}
