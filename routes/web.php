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
Route::get('/test', function () 
{
	// $pengguna 	= [
	// 				'email'		=> 'chelsy@thunderlab.id',
	// 				'nama'		=> 'Chelsy Mooy',
	// 				'password'	=> 'TLABGO!!!!',
	// ];
	// dispatch(new Thunderlabid\Application\Commands\ACL\DaftarkanPengguna($pengguna));
	// $pengguna 	= Thunderlabid\Immigration\Models\Pengguna::get();
	// dd($pengguna);

	// $visa 		= [
	// 	'id'		=> null,
	// 	'role'		=> 'pimpinan',
	// 	'notaris'	=> [
	// 		'id'	=> 'NOTARI123',
	// 		'nama'	=> 'NOTARI MAJU JAYA'
	// 	],
	// ];
	// dispatch(new Thunderlabid\Application\Commands\ACL\GrantVisa('E47CE8E4-6394-462E-93F9-8B0948E72F00',$visa));

	$visa 	= Thunderlabid\Immigration\Models\Visa_A::first();
	$visa->immigration_ro_notaris_id = 'NOTARI123';
	dd($visa->save());
});

Route::get('/', function () 
{
    return view('welcome');
});

//Menu Login
Route::get('login', 	['uses' => 'LoginController@index', 		'as' => 'login.index']);
Route::post('login',	['uses' => 'LoginController@logging', 		'as' => 'login.store']);
Route::get('logout',	['uses' => 'LoginController@logout', 		'as' => 'login.destroy']);


//Menu Dashboard
Route::get('dashboard', 	['uses' => 'DashboardController@index', 'as' => 'dashboard.index']);
