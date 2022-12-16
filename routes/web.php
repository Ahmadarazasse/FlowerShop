<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\flowerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\orderController;




Route::get('/', function()
{
    return redirect('flowers');
});


Route::resource('/flowers', flowerController::class);

Route::resource('/admin', adminController::class);

Route::resource('/carts', CartController::class);

Route::resource('/users', userController::class );

Route::resource('/order', orderController::class );

