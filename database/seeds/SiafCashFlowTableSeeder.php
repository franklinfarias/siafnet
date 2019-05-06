<?php

use Illuminate\Database\Seeder;

class SiafCashFlowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_cash_flow')->insert([
            'id_cash_flow' => 1,
            'id_client' => 2,
            'id_account_plan' => 3,
            'id_bank' => 1,
            'id_supplier' => 1,
            'id_customer' => null,
            'num_document' => 'DOC001',
            'dt_emission' => '2014-10-12',
            'dt_expired' => '2014-10-12',
            'dt_payment' => null,
            'vl_amount' => 12.34,
            'vl_payment' => null,
            'comment' => 'initial registry for document DOC001',
            'ind_tp_cash_flow' => '1',
            'ind_st_cash_flow' => '1',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_cash_flow')->insert([
            'id_cash_flow' => 2,
            'id_client' => 2,
            'id_account_plan' => 7,
            'id_bank' => 1,
            'id_supplier' => null,
            'id_customer' => 1,
            'num_document' => 'REC001',
            'dt_emission' => '2014-10-12',
            'dt_expired' => '2014-10-12',
            'dt_payment' => null,
            'vl_amount' => 1234.56,
            'vl_payment' => null,
            'comment' => 'initial registry for document REC001',
            'ind_tp_cash_flow' => '1',
            'ind_st_cash_flow' => '1',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
    }
}

