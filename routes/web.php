<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/food'));
Route::resource('food', FoodController::class);
