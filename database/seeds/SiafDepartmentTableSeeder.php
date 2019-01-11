<?php

use Illuminate\Database\Seeder;

class SiafDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_department')->insert([
            'id_client' => 2,
            'short_name' => 'DPT0001',
            'name' => 'Department 1',
            'mail' => 'dpt0001@fksapiens.com.br',
            'pwd_mail' => bcrypt('123456'),
            'phones' => '6140638848',
            'ind_tp_department' => '1',
            'ind_st_department' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_department')->insert([
            'id_client' => 2,
            'short_name' => 'DPT0002',
            'name' => 'Department 2',
            'mail' => 'dpt0002@fksapiens.com.br',
            'pwd_mail' => bcrypt('123456'),
            'phones' => '6140638848',
            'ind_tp_department' => '1',
            'ind_st_department' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

