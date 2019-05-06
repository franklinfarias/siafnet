<?php

use Illuminate\Database\Seeder;

class SiafMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_member')->insert([
            'id_member' => 1,
            'id_client' => 2,
            'id_customer' => 1,
            'code_registry' => '0000000114',
            'dt_initial' => '2014-10-12',
            'dt_finish' => NULL,
            'observation' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'ind_tp_member' => '0',
            'ind_st_member' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

