<?php

use Illuminate\Database\Seeder;

class SiafCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_customer')->insert([
            'id_client' => 2,
            'full_name' => 'Franklin Neres Farias',
            'address' => 'Q 16 Lote 7 Apto 102, Gama Leste',
            'city' => 'Brasília',
            'district' => 'DF',
            'zip_code' => '72450160',
            'phones' => '6103385272361996320312',
            'dt_birthday' => '1981-03-20',
            'mail' => 'franklin@fksapiens.com.br',
            'url_site' => 'fksapiens.com.br',
            'cpf_cnpj' => '91546273115',
            'rg_ie' => '1803770 SSP-DF',
            'login' => 'franklin.farias',
            'password' => bcrypt('123456'),
            'ind_tp_customer' => '1',
            'ind_education' => '1',
            'ind_gender' => '1',
            'ind_marital_status' => '1',
            'ind_occupation' => '1',
            'ind_st_customer' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

