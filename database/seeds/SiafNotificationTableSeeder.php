<?php

use Illuminate\Database\Seeder;

class SiafNotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Notification
        DB::table('siaf_notification')->insert([
            'ind_tp_notification' => '1',
            'notification_time' => '2014-10-12 00:00:00',
            'id_user_origin' => 1,
            'id_user_destiny' => 1,
            'subject' => 'Welcome to SIAFNET',
            'body' => 'Welcome to SIAFNET ...',
            'ind_st_notification' => '0',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
        // Message
        DB::table('siaf_notification')->insert([
            'ind_tp_notification' => '2',
            'notification_time' => '2014-10-12 00:00:00',
            'id_user_origin' => 1,
            'id_user_destiny' => 1,
            'subject' => 'Welcome to SIAFNET',
            'body' => 'Welcome to SIAFNET ...',
            'ind_st_notification' => '0',
            'created_at' => '2014-10-12 00:00:00',
            'updated_at' => '2014-10-12 00:00:00'
        ]);
    }
}
