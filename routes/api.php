<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ScavengersDataController;
use App\Http\Controllers\Api\CarDataController;
use App\Http\Controllers\Api\CardMemberController;

// Card Member


// Scavengers Apis
Route::get('/user/{id}', [ScavengersDataController::class, 'getUser']);
Route::post('/save-mlo', [ScavengersDataController::class, 'saveMlo']);
Route::post('/save-plastic', [ScavengersDataController::class, 'savePlastic']);
Route::get('/total-weight', [ScavengersDataController::class, 'getTotalWeight']);

// Car Weight Apis
Route::post('/save-weight-car-in', [CarDataController::class, 'CarWeightDataIn']);
Route::post('/save-weight-car-out', [CarDataController::class, 'CarWeightDataOut']);
