<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store']);

    Route::post('/tweets/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'destroy']);

    Route::post('/profiles/{user:username}/follow', [App\Http\Controllers\FollowsController::class, 'store'])->name('follow');
    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'update'])->middleware('can:edit,user');

    Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index']);
});

Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');



