<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProdcutController;

use Illuminate\Support\Facades\Route;


Route::resource('/categories', CategoryController::class)
->names([
    'index'=> 'api.categories.index',
    'create'=> 'api.categories.create',
    'store'=> 'api.categories.store',
    'update'=> 'api.categories.update',
    'destroy'=> 'api.categories.destroy',


]);
Route::resource('/products', ProdcutController::class)
->names([
    'index'=> 'api.products.index',
    'create'=> 'api.products.create',
    'store'=> 'api.products.store',
    'update'=> 'api.products.update',
    'destroy'=> 'api.products.destroy',


]);


