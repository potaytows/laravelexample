<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //import MainController นำมาใช้

//สร้าง route ที่รับ get request "/" โดยเมื่อเข้ามาที่ route นี้ จะเรียกใช้ function "index" ใน MainController
Route::get('/',[MainController::class,'index']); 

//สร้าง route ที่รับ get request "/home" โดยเมื่อเข้ามาที่ route นี้ จะเรียกใช้ function "index" ใน MainController
Route::get('/home',[MainController::class,'index']);

//สร้าง route ที่รับ post request "/" โดยเมื่อเข้ามาที่ route นี้ จะเรียกใช้ function "addExampleData" ใน MainController
Route::post('/addTodo',[MainController::class,'addExampleData']);

//สร้าง route ที่รับ get request "/delete/{id}" โดยเมื่อเข้ามาที่ route นี้ จะเรียกใช้ function "deleteData" ใน MainController
//โดย {id} จะสามารถถูกเรียกใช้ได้ใน MainController
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
