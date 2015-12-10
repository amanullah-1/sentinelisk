<?php

use Illuminate\Database\Seeder;

class SentryGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Pengguna',
            'permissions' => array(
                'pentadbir' => 0,
                'pengguna' => 1,
            )));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Pentadbir',
            'permissions' => array(
                'pentadbir' => 1,
                'pengguna' => 1,
            )));
    }
}
