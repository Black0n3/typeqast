<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// characters
Route::get('/characters', [ApiController::class, 'characters'])->name('api.characters');
Route::get('/characters/search/', [ApiController::class, 'character_search'])->name('api.characters.search');
// starships
Route::get('/starships/search/', [ApiController::class, 'starship_search'])->name('api.starship.search');
