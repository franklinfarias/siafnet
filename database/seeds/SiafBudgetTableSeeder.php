<?php

use Illuminate\Database\Seeder;

class SiafBudgetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_budget')->insert([
            'id_client' => 2,
            'code' => 'BDG0001',
            'name' => 'Budget 1',
            'year_month_ref' => '201401',
            'ind_tp_budget' => '1',
            'ind_st_budget' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

