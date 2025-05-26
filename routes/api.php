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
Route::post('/weight-car-in', [CarDataController::class, 'CarWeightDataIn']);
Route::post('/weight-car-out', [CarDataController::class, 'CarWeightDataOut']);

// Card Member
Route::post('/register-card-member', [CardMemberController::class, 'CardRegister']);
Route::get('/get-member', [CardMemberController::class, 'getMember']);

// Customer Apis
Route::get('/customer', [CarDataController::class, 'getCustomer']);
