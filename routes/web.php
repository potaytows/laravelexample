<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/',[MainController::class,'index']);
Route::get('/home',[MainController::class,'index']);
Route::post('/addTodo',[MainController::class,'addExampleData']);

Route::get('/delete/{id}',[MainController::class,'deleteData']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
