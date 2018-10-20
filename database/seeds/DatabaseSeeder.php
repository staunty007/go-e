<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'first_name' => 'Administrator',
                'last_name' => 'GOENERGEE',
                'is_activated' => 1,
                'mobile' => '123456789',
                'email' => 'admin@goenergee.com',
                'password' => bcrypt('password'),
                'is_completed' => 1,
                'provider' => '',
                'provider_id' => '',
                'access_token' => '',
            ],
            [
                'role_id' => 2,
                'first_name' => 'Agent',
                'last_name' => 'GOENERGEE',
                'is_activated' => 1,
                'mobile' => '123456789',
                'email' => 'agent@goenergee.com',
                'password' => bcrypt('password'),
                'is_completed' => 1,
                'provider' => '',
                'provider_id' => '',
                'access_token' => '',
            ],
            [
                'role_id' => 3,
                'first_name' => 'Disco',
                'last_name' => 'GOENERGEE',
                'is_activated' => 1,
                'mobile' => '123456789',
                'email' => 'disco@goenergee.com',
                'password' => bcrypt('password'),
                'is_completed' => 1,
                'provider' => '',
                'provider_id' => '',
                'access_token' => '',
            ],
        ]);

        DB::table('admin_biodatas')->insert([
            'user_id' => 1,
            'wallet_balance' => 5000000,
            'avatar' => '',
        ]);

        DB::table('agent_biodatas')->insert([
            'user_id' => 2,
            'agent_id' => 'GO-LEK12345',
            'wallet_balance' => 50000,
            'profit' => 0,
            'avatar' => '',
        ]);

        DB::table('services_list')->insert([
            [
                "title" => "EKEDC Electricity Prepaid Meter Payment",
                "link" => "#prepaid-meter",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "title" => "EKEDC Electricity Postpaid Meter Payment",
                "link" => "postpaidpayment",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ]);
    }
}
