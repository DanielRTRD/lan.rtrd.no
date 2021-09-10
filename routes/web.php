<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\Auth\FacebookController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/discord', [DiscordController::class, 'redirectToProvider'])->name('discord.login')->middleware('guest');
    Route::get('/discord/callback', [DiscordController::class, 'handleProviderCallback']);
    Route::get('/facebook', [FacebookController::class, 'redirectToProvider'])->name('facebook.login')->middleware('guest');
    Route::get('/facebook/callback', [FacebookController::class, 'handleProviderCallback']);
});

Route::middleware(['auth:sanctum', 'verified', 'password.confirm'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return redirect()->to('/');
})->name('login');