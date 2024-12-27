<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MainController::class, 'index'])->name('main_index');
Route::post('/', [MainController::class,'store'])->name('main_create');


