<?php

use Illuminate\Database\Seeder;

class SiafBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_bank')->insert([
            'id_client' => 2,
            'name' => 'Bank of America',
            'code' => '000',
            'agency' => '1234',
            'number_account' => '000011',
            'param01' => 'Parameter 01',
            'param02' => 'Parameter 01',
            'param03' => 'Parameter 01',
            'param04' => 'Parameter 01',
            'param05' => 'Parameter 01',
            'param06' => 'Parameter 01',
            'param07' => 'Parameter 01',
            'param08' => 'Parameter 01',
            'param09' => 'Parameter 01',
            'param10' => 'Parameter 01',
            'param11' => 'Parameter 01',
            'param12' => 'Parameter 01',
            'param13' => 'Parameter 01',
            'param14' => 'Parameter 01',
            'param15' => 'Parameter 01',
            'ind_tp_bank' => '1',
            'ind_st_bank' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);

        DB::table('siaf_bank')->insert([
            'id_client' => 2,
            'name' => 'Bank of Brazil',
            'code' => '001',
            'agency' => '1234',
            'number_account' => '000021',
            'param01' => 'Parameter 01',
            'param02' => 'Parameter 01',
            'param03' => 'Parameter 01',
            'param04' => 'Parameter 01',
            'param05' => 'Parameter 01',
            'param06' => 'Parameter 01',
            'param07' => 'Parameter 01',
            'param08' => 'Parameter 01',
            'param09' => 'Parameter 01',
            'param10' => 'Parameter 01',
            'param11' => 'Parameter 01',
            'param12' => 'Parameter 01',
            'param13' => 'Parameter 01',
            'param14' => 'Parameter 01',
            'param15' => 'Parameter 01',
            'ind_tp_bank' => '1',
            'ind_st_bank' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

