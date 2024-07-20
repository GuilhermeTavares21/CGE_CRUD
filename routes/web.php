<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PensamentoController;

Route::get('/', function () {
    return redirect('/pensamentos');
});

Route::resource('pensamentos', PensamentoController::class);

Route::fallback(function () {
    return redirect('/pensamentos');
});
