<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GroupController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->name('admin.')->middleware('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
    Route::get('/create/player', [PlayerController::class, 'create'])->name('player.create');
    Route::post('/store/player', [PlayerController::class, 'store'])->name('player.store');
    Route::get('/edit/{id}/player', [PlayerController::class, 'edit'])->name('player.edit');
    Route::post('/update/{id}/player', [PlayerController::class, 'update'])->name('player.update');
    Route::post('/delete/{id}/player', [PlayerController::class, 'delete'])->name('player.delete');


    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');

});