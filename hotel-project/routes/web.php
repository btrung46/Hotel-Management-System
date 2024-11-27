<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/home', [AdminController::class,'index'])->name('home');
Route::get('/create_room', [AdminController::class,'create_room'])->name('create_room');
Route::post('/add_room', [AdminController::class,'add_room'])->name('add_room');
Route::get('/view_room', [AdminController::class,'view_room'])->name('view_room');
Route::get('/delete_room/{room}', [AdminController::class,'delete_room'])->name('delete_room');

Route::get('/edit_room/{room}', [AdminController::class,'edit_room'])->name('edit_room');
Route::put('/update_room/{room}', [AdminController::class,'update_room'])->name('update_room');


