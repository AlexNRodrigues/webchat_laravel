<?php

use App\Http\Controllers\Web\PageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [\App\Http\Controllers\Web\PageController::class, 'welcome'])->name('welcome');

Route::group(['middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified']
    ], function(){
        Route::get('/dashboard', [\App\Http\Controllers\Web\PageController::class, 'dashboard'])->name('dashboard');
        Route::get('/chat', [\App\Http\Controllers\Web\PageController::class, 'chat'])->name('chat');
});