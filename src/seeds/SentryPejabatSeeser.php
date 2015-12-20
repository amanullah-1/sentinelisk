<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryPejabatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pejabat')->delete();

        DB::table('pejabat')->insert([
            [
                'jenis_pejabat'    => 'Ibu Pejabat',
                'nama' => 'Ibu Pejabat AADK',
                'negeri' => 'Selangor',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'jenis_pejabat'    => 'AADK Negeri',
                'nama' => 'AADK Negeri Johor',
                'negeri' => 'Johor',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ], [
                'jenis_pejabat'    => 'AADK Negeri',
                'nama' => 'AADK Negeri Kedah',
                'negeri' => 'Kedah',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
