<?php

use App\Http\Controllers\CategoryConroller;
use Illuminate\Support\Facades\Route;



Route::get('/categories',[CategoryConroller::class,'index'])
->name('categories.index');
Route::get('/categories/create',[CategoryConroller::class,'create'])
->name('categories.create');
Route::post('/categories/store',[CategoryConroller::class,'store'])
->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryConroller::class, 'edit'])
->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryConroller::class, 'update'])
->name('categories.update');
Route::delete('/categories/delete/{id}', [CategoryConroller::class, 'destroy'])
->name('categories.destroy');
