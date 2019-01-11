<?php

use Illuminate\Database\Seeder;

class SiafProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('siaf_profile')->insert(
            ['name_profile' => 'Admin', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_profile')->insert(
            ['name_profile' => 'Managers', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_profile')->insert(
            ['name_profile' => 'Supervisors', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_profile')->insert(
            ['name_profile' => 'Users', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
    }
}
