<?php

use Illuminate\Database\Seeder;

class SiafSupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_supplier')->insert([
            'id_client' => 2,
            'short_name' => 'FKSTI',
            'name' => 'FKSapiens Servicos de TI',
            'mail' => 'franklin@fksapiens.com.br',
            'cpf_cnpj' => '29304807000108',
            'phones' => '6140638848',
            'ind_st_supplier' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_supplier')->insert([
            'id_client' => 2,
            'short_name' => '',
            'name' => 'Franklin Farias',
            'mail' => 'franklin@fksapiens.com.br',
            'cpf_cnpj' => '91546273115',
            'phones' => '6140638848',
            'ind_st_supplier' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

