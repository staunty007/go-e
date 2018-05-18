<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
             ['role_id'=>'4','first_name' => "Distributor","provider"=>'twitter',"provider_id"=>'465645','last_name' => "Account",'is_activated'=>1,"mobile"=>'','email'=>'distributor@goenergee.com','password'=> bcrypt('password')]
        );
    }
}
