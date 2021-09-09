<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DiscordController;

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
    Route::get('/login/discord', [DiscordController::class, 'redirectToProvider'])->name('discord.login');
    Route::get('/login/discord/callback', [DiscordController::class, 'handleProviderCallback'])->name('discordLoginCallback');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
