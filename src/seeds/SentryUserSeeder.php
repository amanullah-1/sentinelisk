<?php

use Illuminate\Database\Seeder;

class SentryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create(array(
            'email'    => 'pentadbir.sistem@adk.gov.my',
            'username' => '987654321000',
            'password' => 'pentadbir',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email'    => 'iskandar_ali@adk.gov.my',
            'username' => '840426105347',
            'password' => '12345678',
            'activated' => 1,
        ));
    }
}
