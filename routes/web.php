<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PensamentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pensamentos', PensamentoController::class);
