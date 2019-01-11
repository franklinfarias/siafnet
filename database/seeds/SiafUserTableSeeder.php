<?php

use Illuminate\Database\Seeder;

class SiafUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_user')->insert([
            'id_client' => 1,
            'id_profile' => 1,
            'name' => 'Franklin Farias',
            'login' => 'franklin.farias',
            'email' => 'franklin@fksapiens.com.br',
            'cpf' => '91546273115',
            'signature' => null,
            'password' => bcrypt('123456'),
            'photo' => null,
            'ind_st_user' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_user')->insert([
            'id_client' => 2,
            'id_profile' => 1,
            'name' => 'Paulo Cesar',
            'login' => 'paulo.cesar',
            'email' => 'paulo.cesar@fksapiens.com.br',
            'cpf' => '00000000001',
            'signature' => null,
            'password' => bcrypt('123456'),
            'photo' => null,
            'ind_st_user' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        //
        DB::table('siaf_user')->insert([
            'id_client' => 2,
            'id_profile' => 2,
            'name' => 'João Gabriel',
            'login' => 'joao_gabriel',
            'email' => 'joao_gabriel@fksapiens.com.br',
            'cpf' => '00000000002',
            'signature' => null,
            'password' => bcrypt('123456'),
            'photo' => null,
            'ind_st_user' => '1',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}

