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
    Route::group(['prefix' => 'login'], function () {
        Route::get('/discord', [DiscordController::class, 'redirectToProvider'])->name('discord.login');
        Route::get('/discord/callback', [DiscordController::class, 'handleProviderCallback'])->name('discordLoginCallback');
        Route::get('/facebook', [FacebookController::class, 'redirectToProvider'])->name('facebook.login');
        Route::get('/facebook/callback', [FacebookController::class, 'handleProviderCallback'])->name('facebookLoginCallback');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
