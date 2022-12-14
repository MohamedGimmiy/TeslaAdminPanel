<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin'], function (){
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Auth::routes();
});


Route::get('/admin/{any?}', function () {
    return view('welcome');
})->middleware('auth');

Route::get('{any?}', function () {
    return view('welcome');
});
//->where('{any?}','.*');


/* Route::get('/home', 'HomeController@index')->name('home');
 */
