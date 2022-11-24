<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/importUsers', function() {
    return view('import');
});

Route::POST('import', [UserController::class, 'import']);