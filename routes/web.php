<?php

use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\UserAController;
use App\Http\Controllers\UserController;
use App\Orders\OrderDetails;
use Hamcrest\Number\OrderingComparison;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(["verified"]);

Route::resource('usera', UserAController::class)->middleware('auth');
Route::get('user/{id}/change-password', [UserController::class, 'ResetPassword'])->middleware('auth');
Route::put('user/change-password', [UserController::class, 'ChangePassword'])->middleware('auth');




// Route::get('user/{id}/edit', [UserController    ::class, 'Edit'])->middleware('auth');
// Route::put('user/update', [UserController::class, 'Update'])->middleware('auth');
// Route::delete('user/{id}/delete', [UserController::class, 'Destroy'])->middleware('auth');
// Route::post('user/save', [UserController::class, 'Save'])->middleware('auth');
// Route::get('user/{id}/change-password', [UserController::class, 'ResetPassword'])->middleware('auth');
// Route::put('user/change-password', [UserController::class, 'ChangePassword'])->middleware('auth');

// Route::get('add-user', function () {
//     return view('adduser');
// })->middleware('auth');

// Route::get('user/{id}/change-password', function () {
//     return view('changepassword');
// })->middleware('auth');

// Route::get('testin',[UserController::class,'testing']);

Route::get('testin', function(UserController $user){
    dump($user->testing());
});

Route::get('pay',[PayOrderController::class,'store']);

Route::get('order-details',function()
{
    return OrderDetails::hello();

});

Route::get('/response-check ', function () {
    return redirect()->away('https://www.google.com');
});