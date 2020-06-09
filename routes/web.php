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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('drivers','DriversController')->middleware('auth');

Route::resource('trucks','TruckController')->middleware('auth');
Route::resource('clients','ClientController')->middleware('auth');
Route::resource('goods','GoodController')->middleware('auth');
Route::resource('payments','PaymentController')->middleware('auth');
Route::get('/clients/transactions/{id}','ClientController@transactions' )->name('clients.transactions')->middleware('auth');
Route::resource('expenses','ExpensesController')->middleware('auth');
Route::post('clients/transactions/baupdate','ClientController@updateBulk')->name('clients.bupdate')->middleware('auth');
Route::post('/payments/create/Goodfetch','PaymentController@fetchGood')->name('payment.Goodfetch')->middleware('auth');
Route::get('/trucks/operations/{id}','TruckController@operations')->name('trucks.operations')->middleware('auth');
Route::get('/clients/transactions/pdf/{id}','ClientController@transactionspdf' )->name('clients.transactionspdf')->middleware('auth');
Route::post('/goods/create/TruckfetchDriver','GoodController@TruckfetchDriver')->name('good.TruckfetchDriver')->middleware('auth');
Route::get('/drivers/tasks/{id}','DriversController@driverTasks' )->name('drivers.tasks')->middleware('auth');
Route::get('/drivers/tasks/{id}/details','DriversController@taskdetails' )->name('drivers.taskdetails')->middleware('auth');
Route::get('/driver/tasks/{id}/pdf','DriversController@taskdetailspdf' )->name('drivers.taskdetailspdf')->middleware('auth');



//CSV import route
