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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('error');
});

Route::get('/oncereserve/reserve', 'OnceReserveController@info');
Route::post('/oncereserve/confirm', 'OnceReserveController@confirm');
Route::post('/oncereserve/payment', 'OnceReserveController@payment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 規約関連
Route::get('/privacypolicy', function() {
    return view('privacypolicy');
});
Route::get('/terms', function() {
    return view('terms');
});
Route::get('/point', function() {
    return view('point');
});

//料金シュミレーション
Route::get('/simulation','SimulationController@info');

// 予約関連
Route::get('/reserve','ReserveController@reserveform');
Route::post('/reserved','ReserveController@reserved');
Route::get('/reservelog','ReserveController@reservelog');
Route::get('/cancelform/{order_id}','ReserveController@cancelform');
Route::post('/cancelform/{order_id}','ReserveController@cancel');
Route::post('/payment','ReserveController@payment');

// Myカー関連
Route::get('/mycarinfo','MyCarController@info');
Route::get('/mycarinsert','MyCarController@insertform');
Route::post('/mycarinsert','MyCarController@insert');
Route::get('/mycarupdate/{mycar_id}','MyCarController@updateform');
Route::post('/mycarupdate','MyCarController@update');
Route::post('/mycardelete','MyCarController@delete');

// 駐車場関連
Route::get('/parkinginfo','ParkingController@info');
Route::get('/parkinginsert','ParkingController@insertform');
Route::post('/parkinginsert','ParkingController@insert');
Route::get('/parkingupdate/{parking_id}','ParkingController@updateform');
Route::post('/parkingupdate','ParkingController@update');
Route::post('/parkingdelete','ParkingController@delete');

// 個人情報関連
Route::get('/personalinfo','PersonalController@index');
Route::get('/personalupdate','PersonalController@personalupdateform');
Route::post('/personalupdate','PersonalController@personalupdate');
Route::get('/personalupdatepassword','PersonalController@personalupdatepasswordform');
Route::post('/personalupdatepassword','PersonalController@personalupdatepassword');

// 管理者ページ
Route::get('/manage','ManageController@info');
Route::get('/manage/{order_id}','ManageController@washconfirm');
Route::post('/washed','ManageController@washed');
Route::post('/raincancel','ManageController@raincancel');
Route::post('/manageselect','ManageController@selected');
Route::get('/calendarform','ManageController@calendarform');
Route::get('/calendaroffday','ManageController@calendaroffday');
Route::get('/calendarreflect','ManageController@calendarreflect');
Route::get('/usersinfo','ManageController@usersinfo');
