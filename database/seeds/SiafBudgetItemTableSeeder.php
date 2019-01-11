<?php

use Illuminate\Database\Seeder;

class SiafBudgetItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into siaf_budget_item(id_client, id_budget, id_account_plan, vl_budget, '.
            'ind_budget_restrict, created_at, updated_at) select 2, 1, id_account_plan, 0.00, \'1\', '.
            'current_timestamp, current_timestamp from siaf_account_plan');

        //DB::table('siaf_budget_item')->insert([
        //    'id_client' => 2,
        //    'id_budget' => 1,
        //    'id_account_plan' => 1,
        //    'vl_budget' => 3.97,
        //    'ind_budget_restrict' => '1',
        //    'created_at' => '2014-10-12 00:00:00',
        //    'updated_at' => '2014-10-12 00:00:00'
        //]);
    }
}

