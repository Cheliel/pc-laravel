<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/2', function () {
    return view('welcome');
});



Route::get('/', [WelcomeController::class, 'index'])
	->name('homePage');

Route::get('/Pokemons', [PokemonController::class, 'index'])
	->name('listPokemon');

Route::get('/editPokemon', [PokemonController::class, 'edit'])
	->name('editPokemon');

Route::post('/Pokemon/{id}', [PokemonController::class, 'update'])
	->name('updatePokemon');

Route::get('/Pokemon', [PokemonController::class, 'create'])
	->name('createPokemon');

Route::post('/storePokemon', [PokemonController::class, 'store'])
	->name('storePokemon');

Route::post('/deletePokemon/{id}', [PokemonController::class, 'destroy'])
	->name('deletePokemon');


