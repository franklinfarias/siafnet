<?php

use Illuminate\Database\Seeder;

class SiafMemberOfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_member_office')->insert([
            'id_member' => 1,
            'id_office' => 1,
            'dt_initial' => '2014-10-12',
            'dt_finish' => null,
            'observation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'ind_tp_member_office' => '1',
            'ind_st_member_office' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

