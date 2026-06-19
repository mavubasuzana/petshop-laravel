<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Página inicial
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/pets');
});

/*
|--------------------------------------------------------------------------
| Rotas públicas
|--------------------------------------------------------------------------
*/

Route::get('/pets', [PetController::class, 'index'])
    ->name('pets.index');

Route::get('/pets/{pet}', [PetController::class, 'show'])
    ->whereNumber('pet')
    ->name('pets.show');

Route::get('/atendimentos', [AtendimentoController::class, 'index'])
    ->name('atendimentos.index');

Route::get('/atendimentos/{atendimento}', [AtendimentoController::class, 'show'])
    ->whereNumber('atendimento')
    ->name('atendimentos.show');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Perfil
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Rotas protegidas - Pets
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/pets/create', [PetController::class, 'create'])
        ->name('pets.create');

    Route::post('/pets', [PetController::class, 'store'])
        ->name('pets.store');

    Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])
        ->whereNumber('pet')
        ->name('pets.edit');

    Route::put('/pets/{pet}', [PetController::class, 'update'])
        ->whereNumber('pet')
        ->name('pets.update');

    Route::delete('/pets/{pet}', [PetController::class, 'destroy'])
        ->whereNumber('pet')
        ->name('pets.destroy');

});

/*
|--------------------------------------------------------------------------
| Rotas protegidas - Atendimentos
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/atendimentos/create', [AtendimentoController::class, 'create'])
        ->name('atendimentos.create');

    Route::post('/atendimentos', [AtendimentoController::class, 'store'])
        ->name('atendimentos.store');

    Route::get('/atendimentos/{atendimento}/edit', [AtendimentoController::class, 'edit'])
        ->whereNumber('atendimento')
        ->name('atendimentos.edit');

    Route::put('/atendimentos/{atendimento}', [AtendimentoController::class, 'update'])
        ->whereNumber('atendimento')
        ->name('atendimentos.update');

    Route::delete('/atendimentos/{atendimento}', [AtendimentoController::class, 'destroy'])
        ->whereNumber('atendimento')
        ->name('atendimentos.destroy');

});

require __DIR__.'/auth.php';