<?php

use Illuminate\Database\Seeder;

class SiafRuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Home','key' => 'home', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Profile','key' => 'user/profile', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Index','key' => 'user/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Create','key' => 'user/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Edit','key' => 'user/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Store','key' => 'user/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Delete','key' => 'user/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Notification','key' => 'user/notification', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->ReadNotification','key' => 'user/readnotification', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'User->Image','key' => 'user/image', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Profile
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile->Index','key' => 'profile/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile->Create','key' => 'profile/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile->Edit','key' => 'profile/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile->Store','key' => 'profile/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile->Delete','key' => 'profile/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Rule
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Rule->Index','key' => 'rule/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Rule->Create','key' => 'rule/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Rule->Edit','key' => 'rule/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Rule->Store','key' => 'rule/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Rule->Delete','key' => 'rule/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Profile-Rule
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile-Rule->Index','key' => 'profileRule/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile-Rule->Create','key' => 'profileRule/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile-Rule->Store','key' => 'profileRule/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Profile-Rule->Delete','key' => 'profileRule/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Company
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Company->Index','key' => 'company/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Company->Create','key' => 'company/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Company->Edit','key' => 'company/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Company->Store','key' => 'company/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Company->Delete','key' => 'company/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Supplier
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Supplier->Index','key' => 'supplier/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Supplier->Create','key' => 'supplier/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Supplier->Edit','key' => 'supplier/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Supplier->Store','key' => 'supplier/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Supplier->Delete','key' => 'supplier/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Department
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Department->Index','key' => 'department/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Department->Create','key' => 'department/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Department->Edit','key' => 'department/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Department->Store','key' => 'department/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Department->Delete','key' => 'department/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Office
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Office->Index','key' => 'office/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Office->Create','key' => 'office/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Office->Edit','key' => 'office/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Office->Store','key' => 'office/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Office->Delete','key' => 'office/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Account Plan
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'AccountPlan->Index','key' => 'accountPlan/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'AccountPlan->Create','key' => 'accountPlan/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'AccountPlan->Edit','key' => 'accountPlan/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'AccountPlan->Store','key' => 'accountPlan/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'AccountPlan->Delete','key' => 'accountPlan/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Budget
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Budget->Index','key' => 'budget/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Budget->Create','key' => 'budget/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Budget->Edit','key' => 'budget/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Budget->Store','key' => 'budget/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Budget->Delete','key' => 'budget/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Budget Item
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->Index','key' => 'budgetItem/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->Create','key' => 'budgetItem/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->Edit','key' => 'budgetItem/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->Store','key' => 'budgetItem/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->Delete','key' => 'budgetItem/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->Wizard','key' => 'budgetItem/wizard', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'BudgetItem->WizardStore','key' => 'budgetItem/wizardStore', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Customer
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Customer->Index','key' => 'customer/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Customer->Create','key' => 'customer/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Customer->Edit','key' => 'customer/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Customer->Store','key' => 'customer/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Customer->Delete','key' => 'customer/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Customer->Image','key' => 'customer/image', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Bank
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Bank->Index','key' => 'bank/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Bank->Create','key' => 'bank/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Bank->Edit','key' => 'bank/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Bank->Store','key' => 'bank/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Bank->Delete','key' => 'bank/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Member
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->Index','key' => 'member/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->Create','key' => 'member/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->Edit','key' => 'member/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->Store','key' => 'member/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->Delete','key' => 'member/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->SearchCustomer JSON','key' => 'member/searchCustomer', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'Member->SearchHistory JSON','key' => 'member/searchHistory', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        // Member-Office
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'MemberOffice->Index','key' => 'memberOffice/index', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'MemberOffice->Create','key' => 'memberOffice/create', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'MemberOffice->Edit','key' => 'memberOffice/edit', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'MemberOffice->Store','key' => 'memberOffice/store', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );
        DB::table('siaf_rule')->insert(
            ['name_rule' => 'MemberOffice->Delete','key' => 'memberOffice/delete', 'created_at' => '2014-10-12 00:00:00', 'updated_at' => '2014-10-12 00:00:00']
        );

    }
}
