<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgentSignupDetailsToAgentsBiodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_biodatas', function (Blueprint $table) {
            $table->text('business_name')->nullable();
            $table->text('business_district')->nullable();
            $table->text('business_address')->nullable();
            $table->boolean('own_outlet')->default(false);
            $table->boolean('operate_min')->default(false);
            $table->boolean('own_computer')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents_biodata', function (Blueprint $table) {
            //
        });
    }
}
