<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaCRUDController;

Route::resource('empresas', EmpresaCRUDController::class);

Route::get('/', function () {
    return view('welcome');

    
});

