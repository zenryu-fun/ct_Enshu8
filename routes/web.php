<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\SearchController;


Route::get('/home', [TodoController::class, 'index'])->middleware('auth');
Route::post('/create', [TodoController::class, 'create']);
Route::post('/update', [TodoController::class, 'update']);
Route::post('/delete', [TodoController::class, 'delete']);
Route::post('/logout', [TodoController::class, 'logout']);
Route::get('/search', [SearchController::class, 'search']);
Route::post('/search', [SearchController::class, 'search']);
Route::post('/search_update', [SearchController::class, 'search_update']);
Route::post('/search_delete', [SearchController::class, 'search_delete']);
Route::post('/return', [SearchController::class, 'return']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';