<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], 'bot', BotController::class);
