<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryNegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('negeri')->delete();

        DB::table('negeri')->insert([
            [
                'kod_negeri'    =>  '01',
                'nama' => 'Johor',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '02',
                'nama' => 'Kedah',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '03',
                'nama' => 'Kelantan',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '04',
                'nama' => 'Melaka',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '05',
                'nama' => 'Negeri Sembilan',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '06',
                'nama' => 'Pahang',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '07',
                'nama' => 'Pulau Pinang',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '08',
                'nama' => 'Perak',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '09',
                'nama' => 'Perlis',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '10',
                'nama' => 'Selangor',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '11',
                'nama' => 'Terengganu',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '12',
                'nama' => 'Sabah',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '13',
                'nama' => 'Sarawak',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '14',
                'nama' => 'WP. Kuala Lumpur',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '15',
                'nama' => 'WP. Labuan',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'kod_negeri'    =>  '16',
                'nama' => 'WP. Putrajaya',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
