<?php

use Illuminate\Database\Seeder;

class SiafAccountPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 1,
            'id_client' => 2,
            'id_sub_account_plan' => null,
            'code' => '100',
            'name' => 'ATIVO CIRCULANTE',
            'ind_fnc_account_plan' => '1',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 2,
            'id_client' => 2,
            'id_sub_account_plan' => 1,
            'code' => '100.01',
            'name' => 'CAIXA E FUNDO FIXO',
            'ind_fnc_account_plan' => '1',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 3,
            'id_client' => 2,
            'id_sub_account_plan' => 2,
            'code' => '100.01.01',
            'name' => 'CAIXA',
            'ind_fnc_account_plan' => '1',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 4,
            'id_client' => 2,
            'id_sub_account_plan' => 2,
            'code' => '100.01.02',
            'name' => 'FUNDO FIXO',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 5,
            'id_client' => 2,
            'id_sub_account_plan' => null,
            'code' => '200',
            'name' => 'RECEITA',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 6,
            'id_client' => 2,
            'id_sub_account_plan' => 5,
            'code' => '200.01',
            'name' => 'RECEITAS LIQUIDAS',
            'ind_fnc_account_plan' => '1',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 7,
            'id_client' => 2,
            'id_sub_account_plan' => 5,
            'code' => '200.01.01',
            'name' => 'CONTRIBUIÇÕES',
            'ind_fnc_account_plan' => '1',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_account_plan')->insert([
            'id_account_plan' => 8,
            'id_client' => 2,
            'id_sub_account_plan' => 5,
            'code' => '200.01.02',
            'name' => 'OUTRAS FONTES',
            'ind_fnc_account_plan' => '1',
            'ind_tp_account_plan' => '1',
            'ind_st_account_plan' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

