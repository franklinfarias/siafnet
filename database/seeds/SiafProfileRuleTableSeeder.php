<?php

use Illuminate\Database\Seeder;

class SiafProfileRuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into siaf_profile_rule(id_profile,id_rule) select 1, id_rule from siaf_rule');
        /*// Admin
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 1, 'id_rule' => 1]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 1, 'id_rule' => 2]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 1, 'id_rule' => 3]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 1, 'id_rule' => 4]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 1, 'id_rule' => 5]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 1, 'id_rule' => 6]
        );
        // Managers
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 2, 'id_rule' => 1]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 2, 'id_rule' => 2]
        );
        // Supervisors
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 3, 'id_rule' => 1]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 3, 'id_rule' => 2]
        );
        // Users
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 4, 'id_rule' => 1]
        );
        DB::table('siaf_profile_rule')->insert(
            ['id_profile' => 4, 'id_rule' => 2]
        );*/
    }
}
