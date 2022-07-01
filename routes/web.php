<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function() {
    $exitCode = Artisan::call('optimize');
     return 'clear';
});



//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/login', [UserController::class, 'login'])->name('login');
//
//
//Route::group(['middleware' => ['auth:admin']], function() {
//    Route::get('/users', [UserController::class, 'user']);
//});


Route::view('/', 'welcome');
Auth::routes();

//Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
//Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
//Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
//Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('showAdminLoginForm');
Route::get('/login/writer', [LoginController::class, 'showWriterLoginForm'])->name('showWriterLoginForm');
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm'])->name('showAdminRegisterForm');
Route::get('/register/writer', [RegisterController::class, 'showWriterRegisterForm'])->name('showWriterRegisterForm');

Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('adminLogin');
Route::post('/login/writer', [LoginController::class, 'writerLogin'])->name('writerLogin');
Route::post('/register/admin', [RegisterController::class, 'createAdmin'])->name('createAdmin');
Route::post('/register/writer', [RegisterController::class, 'createWriter'])->name('createWriter');


Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/writer', 'writer');
