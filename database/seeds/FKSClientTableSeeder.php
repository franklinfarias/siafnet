<?php

use Illuminate\Database\Seeder;

class FKSClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fks_client')->insert([
            'id_client' => 1,
            'id_user' => null,
            'cpf_cnpj' => '29304807000108',
            'short_name' => 'FKSapiens',
            'name' => 'FKSapiens Informática',
            'address' => 'Quadra 16 Lote 7, Gama Leste',
            'zip_code' => '72450160',
            'city' => 'Brasília',
            'uf' => 'DF',
            'url' => 'fksapiens.com.br',
            'mail' => 'fksapiens@fksapiens.com.br',
            'login' => 'fksapiens',
            'password' => bcrypt('123456'),
            'ind_tp_client' => '1',
            'ind_st_client' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('fks_client')->insert([
            'id_client' => 2,
            'id_user' => null,
            'cpf_cnpj' => '00110932000197',
            'short_name' => 'PIBGAMA',
            'name' => 'Primeira Igreja Batista do Gama',
            'address' => 'Area Especial 36/37, Gama Central',
            'zip_code' => '72460000',
            'city' => 'Brasília',
            'uf' => 'DF',
            'url' => 'pibgama.org.br',
            'mail' => 'maf@pibgama.org.br',
            'login' => 'pibgama',
            'password' => bcrypt('123456'),
            'ind_tp_client' => '1',
            'ind_st_client' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

