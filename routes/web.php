<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AtendimentoController;

Route::get('/', function () {
    return redirect('/pets');
});

Route::resource('pets', PetController::class);

Route::resource('atendimentos', AtendimentoController::class);