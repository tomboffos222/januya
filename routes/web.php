<?php
//User
Route::get('/','UserController@Home')->name('Home');
Route::get('register/page','UserController@RegisterPage')->name('RegisterPage');
Route::post('register','UserController@Register')->name('Register');
Route::get('login/page','UserController@LoginPage')->name('LoginPage');
Route::post('login','UserController@Login')->name('Login');

Route::get('user/purchase/{id?}','UserController@Purchase')->name('Purchase');
Route::get('register/consultant/{id}','UserController@RegConsultant')->name('RegConsultant');
Route::get('user/prove/{id?}','UserController@Prove')->name('Prove');
Route::get('client/registration/{id}','UserController@Registration')->name('Registration');

Route::post('register/client/','UserController@RegisterClient')->name('RegisterClient');
Route::get('pay/debt/{id}','UserController@PayDebt')->name('PayDebt');
Route::middleware(['userCheck'])->group(function () {
    Route::get('Main','UserController@Main')->name('Main');
    Route::get('user/payments','UserController@Payments')->name('Payments');
    Route::get('out','UserController@Out')->name('Out');

    Route::get('choose/{userId?}','UserController@MainTree')->name('MainTree');
    Route::get('tree/{userId}/{tree?}','UserController@Tree')->name('Tree');
    Route::get('profits/','UserController@Profits')->name('Profits');
    Route::get('withdraws/','UserController@Withdraws')->name('Withdraws');
    Route::get('create/withdraw','UserController@CreateWithdraw')->name('CreateWithdraw');

    Route::get('go/out','UserController@Exit')->name('Exit');


});



//Admin
Route::get('admin','AdminController@LoginPage')->name('admin.LoginPage');
Route::post('admin/login','AdminController@Login')->name('admin.Login');

Route::name('admin.')->prefix('admin')->middleware(['adminCheck'])->group(function () {
    Route::get('users','AdminController@Users')->name('Users');
    Route::get('out','AdminController@Out')->name('Out');
    Route::post('RegisterUser','AdminController@RegisterUser')->name('RegisterUser');
    Route::get('choose/{userId?}','AdminController@MainTree')->name('MainTree');
    Route::get('tree/{userId}/{tree?}','AdminController@Tree')->name('Tree');
    Route::get('all/trees','AdminController@Trees')->name('Trees');

    Route::get('withdraws/','AdminController@Withdraws')->name('Withdraws');
    Route::get('RejectUser/{userId}','AdminController@RejectUser')->name('RejectUser');
    Route::get('withdraws/approve/{id}','AdminController@WithdrawApprove')->name('WithdrawApprove');
    Route::get('withdraws/reject/{id}','AdminController@WithdrawReject')->name('WithdrawReject');

});




