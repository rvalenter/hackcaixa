<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/simulador', [\App\Http\Controllers\CreditSimulatorController::class, 'simulator']);
