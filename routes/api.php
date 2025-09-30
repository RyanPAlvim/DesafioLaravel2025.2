<?php

use App\Http\Controllers\Api\CepController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;   

Route::get('/cep/{cep}', [CepController::class, 'show']);