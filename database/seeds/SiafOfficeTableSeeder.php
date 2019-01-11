<?php

use Illuminate\Database\Seeder;

class SiafOfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_office')->insert([
            'id_client' => 2,
            'id_department' => 1,
            'short_name' => 'OFF0001',
            'name' => 'Office 1',
            'ind_tp_office' => '1',
            'ind_st_office' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_office')->insert([
            'id_client' => 2,
            'id_department' => 2,
            'short_name' => 'OFF0002',
            'name' => 'Office 2',
            'ind_tp_office' => '1',
            'ind_st_office' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

