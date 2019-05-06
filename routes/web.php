<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Localization Config :: to you change language
Route::get('/locale', function () { return \App::getLocale();});
Route::get('/locale/{locale}', function ($locale){
    \Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/home', 'HomeController@index');
    // User Routes
    Route::get('user/list', ['as' => 'user.list', 'uses' => 'SiafUserController@index', 'rule' => 'user/index']);
    Route::get('user/create', ['as' => 'user.create', 'uses' => 'SiafUserController@create', 'rule' => 'user/create']);
    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'SiafUserController@edit', 'rule' => 'user/edit']);
    Route::get('user/image/{id}', ['as' => 'user.image', 'uses' => 'SiafUserController@getImage', 'rule' => 'user/image']);
    Route::get('user/profile', ['as' => 'user.profile', 'uses' => 'SiafUserController@profile', 'rule' => 'user/profile']);
    Route::get('user/notification', ['as' => 'user.notification', 'uses' => 'SiafUserController@notification', 'rule' => 'user/notification']);
    Route::get('user/readnotification', ['as' => 'user.readnotification', 'uses' => 'SiafUserController@readNotification', 'rule' => 'user/readnotification']);
    Route::post('user/store', ['as' => 'user.store', 'uses' => 'SiafUserController@store', 'rule' => 'user/store']);
    Route::post('user/storeProfile', ['as' => 'user.storeprofile', 'uses' => 'SiafUserController@storeProfile', 'rule' => 'user/storeprofile']);
    // Profile Routes
    Route::get('profile/list', ['as' => 'profile.list', 'uses' => 'SiafProfileController@index', 'rule' => 'profile/index']);
    Route::get('profile/create', ['as' => 'profile.create', 'uses' => 'SiafProfileController@create', 'rule' => 'profile/create']);
    Route::get('profile/edit/{id}', ['as' => 'profile.edit', 'uses' => 'SiafProfileController@edit', 'rule' => 'profile/edit']);
    Route::post('profile/store', ['as' => 'profile.store', 'uses' => 'SiafProfileController@store', 'rule' => 'profile/store']);
    Route::delete('profile/delete/{id}', ['as' => 'profile.delete', 'uses' => 'SiafProfileController@delete', 'rule' => 'profile/delete']);
    // Rule Routes
    Route::get('rule/list', ['as' => 'rule.list', 'uses' => 'SiafRuleController@index', 'rule' => 'rule/index']);
    Route::get('rule/create', ['as' => 'rule.create', 'uses' => 'SiafRuleController@create', 'rule' => 'rule/create']);
    Route::get('rule/edit/{id}', ['as' => 'rule.edit', 'uses' => 'SiafRuleController@edit', 'rule' => 'rule/edit']);
    Route::post('rule/store', ['as' => 'rule.store', 'uses' => 'SiafRuleController@store', 'rule' => 'rule/store']);
    Route::delete('rule/delete/{id}', ['as' => 'rule.delete', 'uses' => 'SiafRuleController@delete', 'rule' => 'rule/delete']);
    // Profile/Rule Routes
    Route::get('profileRule/list', ['as' => 'profileRule.list', 'uses' => 'SiafProfileRuleController@index', 'rule' => 'profileRule/index']);
    Route::get('profileRule/create', ['as' => 'profileRule.create', 'uses' => 'SiafProfileRuleController@create', 'rule' => 'profileRule/create']);
    Route::post('profileRule/store', ['as' => 'profileRule.store', 'uses' => 'SiafProfileRuleController@store', 'rule' => 'profileRule/store']);
    Route::delete('profileRule/delete/{idProfile}/{idRule}', ['as' => 'profileRule.delete', 'uses' => 'SiafProfileRuleController@delete', 'rule' => 'profileRule/delete']);
    // Company Routes
    Route::get('company/list', ['as' => 'company.list', 'uses' => 'SiafCompanyController@index', 'rule' => 'company/index']);
    Route::get('company/create', ['as' => 'company.create', 'uses' => 'SiafCompanyController@create', 'rule' => 'company/create']);
    Route::get('company/edit/{id}', ['as' => 'company.edit', 'uses' => 'SiafCompanyController@edit', 'rule' => 'company/edit']);
    Route::post('company/store', ['as' => 'company.store', 'uses' => 'SiafCompanyController@store', 'rule' => 'company/store']);
    Route::delete('company/delete/{id}', ['as' => 'company.delete', 'uses' => 'SiafCompanyController@delete', 'rule' => 'company/delete']);
    // Suppliers Routes
    Route::get('supplier/list', ['as' => 'supplier.list', 'uses' => 'SiafSupplierController@index', 'rule' => 'supplier/index']);
    Route::get('supplier/create', ['as' => 'supplier.create', 'uses' => 'SiafSupplierController@create', 'rule' => 'supplier/create']);
    Route::get('supplier/edit/{id}', ['as' => 'supplier.edit', 'uses' => 'SiafSupplierController@edit', 'rule' => 'supplier/edit']);
    Route::post('supplier/store', ['as' => 'supplier.store', 'uses' => 'SiafSupplierController@store', 'rule' => 'supplier/store']);
    Route::delete('supplier/delete/{id}', ['as' => 'supplier.delete', 'uses' => 'SiafSupplierController@delete', 'rule' => 'supplier/delete']);
    // Department Routes
    Route::get('department/list', ['as' => 'department.list', 'uses' => 'SiafDepartmentController@index', 'rule' => 'department/index']);
    Route::get('department/create', ['as' => 'department.create', 'uses' => 'SiafDepartmentController@create', 'rule' => 'department/create']);
    Route::get('department/edit/{id}', ['as' => 'department.edit', 'uses' => 'SiafDepartmentController@edit', 'rule' => 'department/edit']);
    Route::post('department/store', ['as' => 'department.store', 'uses' => 'SiafDepartmentController@store', 'rule' => 'department/store']);
    Route::delete('department/delete/{id}', ['as' => 'department.delete', 'uses' => 'SiafDepartmentController@delete', 'rule' => 'department/delete']);
    // Office Routes
    Route::get('office/list', ['as' => 'office.list', 'uses' => 'SiafOfficeController@index', 'rule' => 'office/index']);
    Route::get('office/create', ['as' => 'office.create', 'uses' => 'SiafOfficeController@create', 'rule' => 'office/create']);
    Route::get('office/edit/{id}', ['as' => 'office.edit', 'uses' => 'SiafOfficeController@edit', 'rule' => 'office/edit']);
    Route::post('office/store', ['as' => 'office.store', 'uses' => 'SiafOfficeController@store', 'rule' => 'office/store']);
    Route::delete('office/delete/{id}', ['as' => 'office.delete', 'uses' => 'SiafOfficeController@delete', 'rule' => 'office/delete']);
    // Account Plan Routes
    Route::get('accountPlan/list', ['as' => 'accountPlan.list', 'uses' => 'SiafAccountPlanController@index', 'rule' => 'accountPlan/index']);
    Route::get('accountPlan/create', ['as' => 'accountPlan.create', 'uses' => 'SiafAccountPlanController@create', 'rule' => 'accountPlan/create']);
    Route::get('accountPlan/edit/{id}', ['as' => 'accountPlan.edit', 'uses' => 'SiafAccountPlanController@edit', 'rule' => 'accountPlan/edit']);
    Route::post('accountPlan/store', ['as' => 'accountPlan.store', 'uses' => 'SiafAccountPlanController@store', 'rule' => 'accountPlan/store']);
    Route::delete('accountPlan/delete/{id}', ['as' => 'accountPlan.delete', 'uses' => 'SiafAccountPlanController@delete', 'rule' => 'accountPlan/delete']);
    // Budget Routes
    Route::get('budget/list', ['as' => 'budget.list', 'uses' => 'SiafBudgetController@index', 'rule' => 'budget/index']);
    Route::get('budget/create', ['as' => 'budget.create', 'uses' => 'SiafBudgetController@create', 'rule' => 'budget/create']);
    Route::get('budget/edit/{id}', ['as' => 'budget.edit', 'uses' => 'SiafBudgetController@edit', 'rule' => 'budget/edit']);
    Route::post('budget/store', ['as' => 'budget.store', 'uses' => 'SiafBudgetController@store', 'rule' => 'budget/store']);
    Route::delete('budget/delete/{id}', ['as' => 'budget.delete', 'uses' => 'SiafBudgetController@delete', 'rule' => 'budget/delete']);
    // Budget Item Routes
    Route::get('budgetItem/list', ['as' => 'budgetItem.list', 'uses' => 'SiafBudgetItemController@index', 'rule' => 'budgetItem/index']);
    Route::get('budgetItem/create', ['as' => 'budgetItem.create', 'uses' => 'SiafBudgetItemController@create', 'rule' => 'budgetItem/create']);
    Route::get('budgetItem/edit/{id}', ['as' => 'budgetItem.edit', 'uses' => 'SiafBudgetItemController@edit', 'rule' => 'budgetItem/edit']);
    Route::post('budgetItem/store', ['as' => 'budgetItem.store', 'uses' => 'SiafBudgetItemController@store', 'rule' => 'budgetItem/store']);
    Route::delete('budgetItem/delete/{id}', ['as' => 'budgetItem.delete', 'uses' => 'SiafBudgetItemController@delete', 'rule' => 'budgetItem/delete']);
    Route::get('budgetItem/wizard', ['as' => 'budgetItem.wizard', 'uses' => 'SiafBudgetItemController@wizardBudgetItem', 'rule' => 'budgetItem/wizard']);
    Route::post('budgetItem/wizardStore', ['as' => 'budgetItem.wizardStore', 'uses' => 'SiafBudgetItemController@wizardStore', 'rule' => 'budgetItem/wizardStore']);
    // Customer Routes
    Route::get('customer/list', ['as' => 'customer.list', 'uses' => 'SiafCustomerController@index', 'rule' => 'customer/index']);
    Route::get('customer/create', ['as' => 'customer.create', 'uses' => 'SiafCustomerController@create', 'rule' => 'customer/create']);
    Route::get('customer/edit/{id}', ['as' => 'customer.edit', 'uses' => 'SiafCustomerController@edit', 'rule' => 'customer/edit']);
    Route::get('customer/image/{id}', ['as' => 'customer.image', 'uses' => 'SiafCustomerController@getImage', 'rule' => 'customer/image']);
    Route::post('customer/store', ['as' => 'customer.store', 'uses' => 'SiafCustomerController@store', 'rule' => 'customer/store']);
    Route::delete('customer/delete/{id}', ['as' => 'customer.delete', 'uses' => 'SiafCustomerController@delete', 'rule' => 'customer/delete']);
    // Bank Routes
    Route::get('bank/list', ['as' => 'bank.list', 'uses' => 'SiafBankController@index', 'rule' => 'bank/index']);
    Route::get('bank/create', ['as' => 'bank.create', 'uses' => 'SiafBankController@create', 'rule' => 'bank/create']);
    Route::get('bank/edit/{id}', ['as' => 'bank.edit', 'uses' => 'SiafBankController@edit', 'rule' => 'bank/edit']);
    Route::post('bank/store', ['as' => 'bank.store', 'uses' => 'SiafBankController@store', 'rule' => 'bank/store']);
    Route::delete('bank/delete/{id}', ['as' => 'bank.delete', 'uses' => 'SiafBankController@delete', 'rule' => 'bank/delete']);
    // Member Routes
    Route::get('member/list', ['as' => 'member.list', 'uses' => 'SiafMemberController@index', 'rule' => 'member/index']);
    Route::get('member/create', ['as' => 'member.create', 'uses' => 'SiafMemberController@create', 'rule' => 'member/create']);
    Route::get('member/edit/{id}', ['as' => 'member.edit', 'uses' => 'SiafMemberController@edit', 'rule' => 'member/edit']);
    Route::post('member/store', ['as' => 'member.store', 'uses' => 'SiafMemberController@store', 'rule' => 'member/store']);
    Route::delete('member/delete/{id}', ['as' => 'member.delete', 'uses' => 'SiafMemberController@delete', 'rule' => 'member/delete']);
    Route::get('member/searchCustomer', ['as' => 'member.searchCustomer', 'uses' => 'SiafMemberController@searchCustomer', 'rule' => 'member/searchCustomer']);
    Route::get('member/searchHistory', ['as' => 'member.searchHistory', 'uses' => 'SiafMemberController@searchHistory', 'rule' => 'member/searchHistory']);
    // MemberOffice Routes
    Route::get('memberOffice/list', ['as' => 'memberOffice.list', 'uses' => 'SiafMemberOfficeController@index', 'rule' => 'memberOffice/index']);
    Route::get('memberOffice/create', ['as' => 'memberOffice.create', 'uses' => 'SiafMemberOfficeController@create', 'rule' => 'memberOffice/create']);
    Route::get('memberOffice/edit/{id}', ['as' => 'memberOffice.edit', 'uses' => 'SiafMemberOfficeController@edit', 'rule' => 'memberOffice/edit']);
    Route::post('memberOffice/store', ['as' => 'memberOffice.store', 'uses' => 'SiafMemberOfficeController@store', 'rule' => 'memberOffice/store']);
    Route::delete('memberOffice/delete/{id}', ['as' => 'memberOffice.delete', 'uses' => 'SiafMemberOfficeController@delete', 'rule' => 'memberOffice/delete']);
    // CashFlow Routes
    Route::get('cashFlow/list', ['as' => 'cashFlow.list', 'uses' => 'SiafCashFlowController@index', 'rule' => 'cashFlow/index']);
    Route::get('cashFlow/create', ['as' => 'cashFlow.create', 'uses' => 'SiafCashFlowController@create', 'rule' => 'cashFlow/create']);
    Route::get('cashFlow/edit/{id}', ['as' => 'cashFlow.edit', 'uses' => 'SiafCashFlowController@edit', 'rule' => 'cashFlow/edit']);
    Route::post('cashFlow/store', ['as' => 'cashFlow.store', 'uses' => 'SiafCashFlowController@store', 'rule' => 'cashFlow/store']);
    Route::delete('cashFlow/delete/{id}', ['as' => 'cashFlow.delete', 'uses' => 'SiafCashFlowController@delete', 'rule' => 'cashFlow/delete']);
    Route::get('cashFlow/searchCustomer', ['as' => 'cashFlow.searchCustomer', 'uses' => 'SiafCashFlowController@searchCustomer', 'rule' => 'cashFlow/searchCustomer']);
    Route::get('cashFlow/searchAccountPlan', ['as' => 'cashFlow.searchAccountPlan', 'uses' => 'SiafCashFlowController@searchAccountPlan', 'rule' => 'cashFlow/searchAccountPlan']);
    Route::get('cashFlow/searchBank', ['as' => 'cashFlow.searchBank', 'uses' => 'SiafCashFlowController@searchBank', 'rule' => 'cashFlow/searchBank']);
    Route::get('cashFlow/searchSupplier', ['as' => 'cashFlow.searchSupplier', 'uses' => 'SiafCashFlowController@searchSupplier', 'rule' => 'cashFlow/searchSupplier']);

});


