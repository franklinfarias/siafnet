<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // FKSapiens
        $this->call(FKSUserTableSeeder::class);
        $this->call(FKSClientTableSeeder::class);
        // SIAF
        $this->call(SiafProfileTableSeeder::class);
        $this->call(SiafRuleTableSeeder::class);
        $this->call(SiafProfileRuleTableSeeder::class);
        $this->call(SiafUserTableSeeder::class);
        $this->call(SiafDomainTableSeeder::class);
        $this->call(SiafNotificationTableSeeder::class);
        $this->call(SiafSupplierTableSeeder::class);
        $this->call(SiafDepartmentTableSeeder::class);
        $this->call(SiafOfficeTableSeeder::class);
        $this->call(SiafAccountPlanTableSeeder::class);
        $this->call(SiafBudgetTableSeeder::class);
        $this->call(SiafBudgetItemTableSeeder::class);
        $this->call(SiafCustomerTableSeeder::class);
        $this->call(SiafBankTableSeeder::class);
        $this->call(SiafMemberTableSeeder::class);
        $this->call(SiafMemberOfficeTableSeeder::class);
    }
}
