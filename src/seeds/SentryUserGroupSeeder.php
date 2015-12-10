<?php

use Illuminate\Database\Seeder;

class SentryUserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->delete();

        $userUser = Sentry::getUserProvider()->findByLogin('iskandar_ali@adk.gov.my');
        $adminUser = Sentry::getUserProvider()->findByLogin('pentadbir.sistem@adk.gov.my');

        $userGroup = Sentry::getGroupProvider()->findByName('Pengguna');
        $adminGroup = Sentry::getGroupProvider()->findByName('Pentadbir');

        // Assign the groups to the users
        $userUser->addGroup($userGroup);
        $adminUser->addGroup($userGroup);
        $adminUser->addGroup($adminGroup);
    }
}
