<?php

Route::get('access-denied', function () {
    return view('errors.403');
});
Route::get('/','HomeController@index')->name('login');
Route::post('/','HomeController@sign_in');
Route::get('/register','HomeController@register');
Route::post('/register','HomeController@post_register');
Route::get('/logout','HomeController@logout');

// ************ Dashboard Routes ****************************//
Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/','DashboardController@index');
    Route::get('/users','DashboardController@users')->middleware(['permission:VIEW-USER|CREATE-USER,require_all']);
    Route::post('/users','DashboardController@adduser')->middleware(['permission:CREATE-USER']);
    Route::get('/users/{id}','DashboardController@editUser')->middleware(['permission:VIEW-USER|EDIT-USER,require_all']);
    Route::patch('/users/{id}','DashboardController@updateUser')->middleware(['permission:EDIT-USER']);
    Route::get('/delete-user/{id}','DashboardController@delete_user')->middleware(['permission:DELETE-USER']);
    Route::get('/roles','RoleController@roles')->middleware(['permission:VIEW-ROLES|CREATE-ROLE']);
    Route::get('/addrole','RoleController@addrole')->middleware(['permission:CREATE-ROLE']);
    Route::post('/addrole','RoleController@storeRole')->middleware(['permission:CREATE-ROLE']);
    Route::get('/edit-role/{id}','RoleController@editRole')->middleware(['permission:VIEW-ROLES|EDIT-ROLE']);
    Route::patch('/edit-role/{id}','RoleController@updateRole')->middleware(['permission:EDIT-ROLE']);
    Route::get('/delete-role/{id}','RoleController@deleteRole')->middleware(['permission:DELETE-ROLE']);
    Route::get('/permissions','RoleController@permissions');
    Route::post('/permissions','RoleController@storePermission');
    Route::get('/delete-permission/{id}','RoleController@deletePermission');

});
//**************Profiles Routes ****************************
Route::prefix('/profile')->middleware('auth')->group(function(){
    Route::get('/passwordChange','ProfileController@changePassword');
    Route::post('/passwordChange/{id}','ProfileController@postChangePassword');
    Route::get('/editProfile/{id}','ProfileController@editprofile');
    Route::post('/editprofile/{id}','ProfileController@posteditprofile');
});

// ************ Settings Routes ****************************//
Route::prefix('settings')->middleware('auth')->group(function(){
    Route::get('/','Settings\SettingsController@index');
    Route::post('/','Settings\SettingsController@store');
    Route::get('/courses','Settings\CourseController@index');
    Route::post('/courses','Settings\CourseController@store');
    Route::patch('/update-course','Settings\CourseController@update');
    Route::get('/delete-course/{id}','Settings\CourseController@destroy');
    Route::get('/forms','Settings\FormController@index');
    Route::post('/forms','Settings\FormController@store');
    Route::patch('/update-form','Settings\FormController@update');
    Route::get('/delete-form/{id}','Settings\FormController@destroy');
    Route::get('/units','Settings\SubjectController@index');
    Route::post('/units','Settings\SubjectController@store');
    Route::patch('/update-unit','Settings\SubjectController@update');
    Route::get('/delete-unit/{id}','Settings\SubjectController@destroy');
    Route::get('/staff-category','Staff\CategoryController@index');
    Route::post('/staff-category','Staff\CategoryController@store');
    Route::patch('/update-category','Staff\CategoryController@update');
    Route::get('/delete-category/{id}','Staff\CategoryController@destroy');
    Route::get('/exams','Settings\ExamController@index');
    Route::post('/exams','Settings\ExamController@store');
    Route::patch('/update-exam','Settings\ExamController@update');
    Route::get('/delete-exam/{id}','Settings\ExamController@destroy');
    Route::get('/voteheads','Settings\VoteheadController@index');
    Route::post('/voteheads','Settings\VoteheadController@store');
    Route::patch('/update-votehead','Settings\VoteheadController@update');
    Route::get('/delete-votehead/{id}','Settings\VoteheadController@destroy');
});
// ************ End ****************************//

// ************ Students Routes ****************************//
Route::prefix('students')->middleware('auth')->group(function(){
    Route::get('/','Students\StudentController@index');
    Route::get('/create','Students\StudentController@create');
    Route::post('/create','Students\StudentController@store');
    Route::get('/edit/{id}','Students\StudentController@edit');
    Route::post('/edit/{id}','Students\StudentController@update');
    Route::get('/delete/{id}','Students\StudentController@destroy');

});
// ************ End ****************************//

// ************ Exams Routes ****************************//
Route::prefix('exams')->middleware('auth')->group(function(){
   Route::get('/grading','Exams\GradingController@index');
   Route::post('/grading','Exams\GradingController@store');
   Route::patch('/update-grading','Exams\GradingController@update');
   Route::get('/delete-grading/{id}','Exams\GradingController@destroy');
});
// ************ End ****************************//

//********************fees module ************************************//
Route::prefix('fees')->middleware('auth')->group(function(){
    Route::get('/payment','Accounts\FeeController@payment')->name('payfee');
    Route::post('/payfee','Accounts\FeeController@pay')->name('payment');

    Route::get('/feeperclass','Accounts\FeeController@feePerClass')->name('getFeePerClass');
    Route::post('/getfeeperclass','Accounts\FeeController@getFeePerClass')->name('getfeeperclass');

    Route::get('/allFeeRegister','Accounts\FeeController@allFeeRegister')->name('allFeeRegister');
    Route::get('/studentfeeregister','Accounts\FeeController@studentFeeRegister')->name('studentFeeRegister');

    Route::get('/daily','Accounts\FeeController@dailyPay')->name('dailyPay');
    Route::get('/feesFilter', 'Accounts\FeeController@feesFilter')->name('feesFilter');
    Route::get('/dailyReceipt', 'Accounts\FeeController@getDailyReceipt')->name('getDailyReceipt');
    Route::get('/printdailyReceipt', 'Accounts\FeeController@printDailyReceipt')->name('printDailyReceipt');
    Route::post('/getFeesFilter', 'Accounts\FeeController@getFeesFilter')->name('getFeesFilter');
    Route::post('/printRegister','Accounts\FeeController@printRegister');

    Route::post('/printFeePerClass','Accounts\FeeController@printFeePerClass');
    Route::get('/receipt','Accounts\FeeController@receipt');
    Route::get('/printReceipt','Accounts\FeeController@printReceipt');
});
//********************invoices module ********************************
Route::prefix('invoices')->middleware('auth')->group(function(){

    Route::get('/addInvoice', 'Accounts\InvoiceController@addinvoice')->name('addinvoice');
    Route::post('/addInvoice', 'Accounts\InvoiceController@postAddInvoice')->name('posAddinvoice');
    Route::post('/createInvoice','Accounts\InvoiceController@createInvoice')->name('createInvoice');
    Route::get('/view','Accounts\InvoiceController@invoices');
    Route::post('/getInvoices','Accounts\InvoiceController@getinvoices');
    Route::post('/printInvoice', 'Accounts\InvoiceController@printInvoice');

});
//*************************payment module*********************************
Route::prefix('payments')->middleware('auth')->group(function(){
    Route::get('/makePayment','Accounts\PaymentController@makePayment')->name('makePayment');
    Route::post('/makePayment','Accounts\PaymentController@makePay')->name('makePay');

    Route::get('/allPayments','Accounts\PaymentController@allPayments')->name('allpayments');
    Route::get('/getPayments','Accounts\PaymentController@getPayments')->name('getpayments');
    Route::get('/printPayment', 'Accounts\PaymentController@printPayment')->name('printPayment');

});


//******************Deposits routes**********************************
Route::prefix('deposits')->middleware('auth')->group(function(){
    Route::get('/RecievePayment', 'Accounts\DepositController@receivePayment');
    Route::post('/receivePayment', 'Accounts\DepositController@getPayment');
});


//****************finance routes***************************************
Route::prefix('finance')->middleware('auth')->group(function(){
    Route::get('/report','Accounts\FinanceController@financeReport');
    Route::post('/viewReport','Accounts\FinanceController@viewReport');
});
//***********staff routes************************************************
Route::prefix('staff')->middleware('auth')->group(function(){
    Route::get('/teaching/staff','Staff\StaffController@manageStaff')->name('manageStaff');
    Route::get('/create','Staff\StaffController@create')->name('create');
    Route::post('/store','Staff\StaffController@store')->name('store');

    Route::get('/edit/{id}','Staff\StaffController@edit')->name('edit');
    Route::post('/update/{id}','Staff\StaffController@update')->name('update');

    Route::get('/delete/{id}','Staff\StaffController@destroy')->name('destroy');

});

//***********Employee routes************************************************
Route::prefix('employees')->middleware('auth')->group(function(){
    Route::get('/employee','Staff\EmployeeController@manageEmployee')->name('manageEmployee');
    Route::get('/create','Staff\EmployeeController@create')->name('employee.create');
    Route::post('/store','Staff\EmployeeController@store')->name('employee.store');

    Route::get('/edit/{id}','Staff\EmployeeController@edit')->name('employee.edit');
    Route::post('/update/{id}','Staff\EmployeeController@update')->name('employee.update');

    Route::get('/delete/{id}','Staff\EmployeeController@destroy')->name('employee.destroy');

});

