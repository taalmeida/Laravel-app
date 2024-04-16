<?php

use App\Http\Controllers\Api\RegisterControllerApi;
use Illuminate\Support\Facades\Route;

//rota nao esta sendo encontrada

Route::apiResource('/registers', RegisterControllerApi::class);

//Route::post('/registers', [RegisterControllerApi::class, 'store']) -> name('registers.store');