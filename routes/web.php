<?php

use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/news/{slug?}', [PagesController::class, 'news'])->name('news');
Route::get('/tournaments/{slug?}', [PagesController::class, 'tournaments'])->name('tournaments');
Route::get('/ratings', [PagesController::class, 'ratings'])->name('ratings');
Route::get('/articles/{slug?}', [PagesController::class, 'articles'])->name('articles');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
