<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::get('/admin/wallet/{string}', 'WalletController@show')->middleware('checkHeader');

Route::post('/admin/wallet', 'WalletController@create')->middleware('checkHeader');

Route::delete('/admin/wallet', 'WalletController@destroy')->middleware('checkHeader');

Route::get('/wallet/{string}', 'WalletController@show')->middleware('checkHeader');

Route::post('/transaction/add', 'TransactionController@add')->middleware('checkHeader');

Route::post('/transaction/deduct', 'TransactionController@deduct')->middleware('checkHeader');

