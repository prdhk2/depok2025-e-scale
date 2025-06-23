<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ScavengersDataController;
use App\Http\Controllers\Api\CarDataController;
use App\Http\Controllers\Api\CardMemberController;
use App\Http\Controllers\Api\BiogasController;

// Card Member


// Scavengers Apis
Route::get('/user/{id}', [ScavengersDataController::class, 'getUser']);
Route::post('/save-mlo', [ScavengersDataController::class, 'saveMlo']);
Route::post('/save-plastic', [ScavengersDataController::class, 'savePlastic']);
Route::get('/total-weight', [ScavengersDataController::class, 'getTotalWeight']);

Route::post('/save-gabruk', [ScavengersDataController::class, 'saveGabruk']);

// Car Weight Apis
Route::post('/weightDataIn', [CarDataController::class, 'CarWeightDataIn']);
Route::post('/weightDataOut', [CarDataController::class, 'CarWeightDataOut']);

// Card Member
Route::post('/register-card-member', [CardMemberController::class, 'CardRegister']);
Route::get('/getMember', [CardMemberController::class, 'getMember']);

// Customer Apis
Route::get('/getCustomer', [CarDataController::class, 'getCustomer']);

// Biogas Control system APis
Route::post('/biogas', [BiogasController::class, 'pushData']);